<?php

namespace Chungu\Controllers;

use Smalot\PdfParser\Parser;
use Chungu\Core\Mantle\DocumentParser;


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
        } catch (\Exception $e) {
            logger('Error', 'An exception for PDF was thrown ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
        return $text;
    }
    //parse word doc
    private function getWordText($file) {
        try {
            $text = DocumentParser::parseFromFile($file);
        } catch (\Exception $e) {
            logger('Error', 'An exception for Word was thrown ' . $e->getMessage());
            throw new \Exception($e->getMessage());
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
           $this->getExcelText($file);
        }
        //plain text
        if (mime_content_type($file) === 'text/plain') {
            $text = file_get_contents($file);
        }

        return $text;
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
                logger('Error', 'An exception for Text was thrown ' . $e->getMessage());
                throw new \Exception($e->getMessage());
            }
        } else {
            $text = wp_strip_all_tags($html);
        }
        return $text;
    }
    public function parse() {

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");

        //empty response
        $messages = [];

        // Handle File upload
        if (!empty($_FILES) && empty($_POST['text'])) {
            try {
                logger('Info', 'Trying to parse ' . implode(', ', $_FILES['files']));
                $text = $this->readUploadedFile($_FILES['files']['tmp_name']);
            } catch (\Exception $e) {
                logger('Error', 'An exception for file upload was thrown ' . $e->getMessage());
                $messages['text'] = '<p class="p-4 text-red-500 text-sm font-semibold text-center">You have no idea what happened huh? Well so do I. Code:E214</p>';
            }
            // Handle Text input
        } elseif (!empty($_POST['text']) && empty($_FILES)) {
            $text = trim($_POST['text']);
            //handle urls
        } elseif (!empty($_POST['url']) && empty($_FILES)) {
            try {
                $text = $this->getUrlText(trim($_POST['url']));
            } catch (\Exception $e) {
                logger('Error', 'An exception for url upload was thrown ' . $e->getMessage());
                $messages['text'] = '<p class="p-4 text-red-500 text-sm font-semibold text-center">You have no idea what happened huh? Well so do I. Code:E214</p>';
            }
        } else {
            $messages['text'] = '<p class="p-4 text-red-500 text-sm font-semibold text-center">You have no idea what happened huh? Well so do I. Code:E561</p>';
        }


        //check if text is empty
        if (!empty($text)) {
            $messages['text'] = $text;
        } else {
            logger('Error', 'An exception for empty text was thrown ' . $e->getMessage());
            $messages['lis_found'] = "No LI's Found!";
            echo json_encode($messages);
            return;
        }

        //search for LIS
        if (!empty($this->getLisInText($text, $this->getAllLis()))) {
            $messages['lis_found'] =  implode(", ", $this->getLisInText($text, $this->getAllLis()));
        } else {
            $messages['lis_found'] = "No LI's Found!";
        }


        // print_r($messages);
        //return the object response
        echo json_encode($messages, JSON_INVALID_UTF8_IGNORE);

      
    }
}
