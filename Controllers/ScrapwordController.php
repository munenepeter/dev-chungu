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

    public function add() {


      

        if (isset($_POST['submit'])) {
            if (empty($_POST['keyword'])) {
                $message = urlencode("No keyword was provided!!");
                header("Location:keywords.php?message=$message");
            }
            $keyword = htmlspecialchars(trim($_POST['keyword']));

            //store the keywords
            $keywords = json_encode([
                'word' => $keyword,
                'color' => getRandColor()
            ]) . PHP_EOL;

        

            if (file_put_contents("keywords.txt", $keywords, FILE_APPEND | LOCK_EX)) {
                echo "New was added!";
            }
        }
    }
}
