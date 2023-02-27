<?php

namespace Chungu\Controllers;

use Smalot\PdfParser\Parser;
use LukeMadhanga\DocumentParser;


class ParserController {

    public function index() {

        return view('parser');
    }

    private function getAllLis() {
        //from db
        $databaseLis = json_decode(file_get_contents("https://munenepeter.github.io/my-file-tracker/data/datas.json"));

        $allLis = [];

        foreach ($databaseLis as $databaseLi) {
            $allLis[] = $databaseLi->name;

            $abbrs = explode(',', trim($databaseLi->abbr));

            foreach ($abbrs as $abbr) {
                $allLis[] = trim($abbr);
            }
        }
        return   $allLis;
    }


    private function getLisInText($text, $lis) {
        $foundWords = [];

        $chunkSize = 242;
        $searchWordChunks = array_chunk(array_unique($lis), $chunkSize);

        // Search for each group of words separately
        foreach ($searchWordChunks as $chunk) {
            $escapedSearchWords = array_map(function ($word) {
                return preg_quote($word, '/');
            }, $chunk);
            $pattern = '/\b(' . implode('|', $escapedSearchWords) . ')\b/i';
            preg_match_all($pattern, $text, $matches);
            //remove duplicate & empty elements
            $foundWords = array_filter(array_unique(array_merge($foundWords, $matches[0])));
        }
        return $foundWords;
    }
    //parse PDF files
    private function getPdfText($filename) {
        try {
            $parser = new Parser();
            $pdf = $parser->parseFile($filename);
            $text = $pdf->getText();
            logger('INFO: Trying to parse ' . implode(', ', $pdf->getDetails()));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
            logger('ERROR: An exception was called ' . $e->getMessage());
            return;
        }
        return $text;
    }
    //parse word doc
    private function getWordText($file) {
        try {
            $text = DocumentParser::parseFromFile($file);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
            logger('ERROR: An exception was called ' . $e->getMessage());
            return;
        }
        return $text;
    }
    private function getExcelText($file) {
        throw new \Exception("Excel format is yet to be supported! E214");
    }
    private function readUploadedFile($file) {
        //pdf
        if (mime_content_type($file) === 'application/pdf') {
            $text = $this->getPdfText($file);
        }
        //word
        if (mime_content_type($file) === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            $text = $this->getWordText($file);
        }
        //Workbook
        if (mime_content_type($file) === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            $text = $this->getExcelText($file);
        }
        //plain text
        if (mime_content_type($file) === 'text/plain') {
            $text = file_get_contents($file);
        }

        return $text;
    }

    private function wp_strip_all_tags($string, $remove_breaks = false) {
        $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
        $string = strip_tags($string);

        if ($remove_breaks) {
            $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
        }

        return trim($string);
    }

    private function getUrlText($url) {
        $context = stream_context_create(
            [
                "http" => [
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                ]
            ]
        );
        $html = file_get_contents($url, false, $context);

        $parser = new Parser();

        if (str_contains($url, ".pdf")) {
            try {
                $text = $parser->parseContent($html)->getText();
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
                logger('ERROR: An exception for URL was thrown ' . $e->getMessage());
                return;
            }
        } else {
            $text = wp_strip_all_tags($html);
        }
        return $text;
    }
}
