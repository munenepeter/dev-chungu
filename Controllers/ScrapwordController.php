<?php

namespace Chungu\Controllers;


class ScrapwordController {

    private $keywords_file = __DIR__ . "/../static/files/keywords.txt";

    public function index() {
        $data = file_get_contents($this->keywords_file);
        $s_keyWords = explode(PHP_EOL, $data);
        array_pop($s_keyWords);

        return view('scrapword', [
            's_keyWords' => $s_keyWords
        ]);
    }
}
