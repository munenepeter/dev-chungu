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

    private function getKeywords() {
        $keywords = [];
        $data = file_get_contents($this->keywords_file);
        $s_keyWords = explode(PHP_EOL, $data);
        array_pop($s_keyWords);
        foreach ($s_keyWords as $keyWord) {
            $keyWord = json_decode($keyWord);
            array_push($keywords, strtolower($keyWord->word));
        }
        return  $keywords;
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

            if (in_array(strtolower($_POST['keyword']), $this->getKeywords())) {
                echo "Keyword is already present!";
                redirectback();
                exit;
            }

            if (file_put_contents($this->keywords_file, $keywords, FILE_APPEND | LOCK_EX)) {
                echo "New was added!";
            }
            redirectback();
        }
    }
    private function checkTheme($keys) {
        $cyber = trim(":cyber, :technology attack, :technology hazard outages, :data corruption, :nist cyber, :dora, :eu-scicf, :eu nis2, :sec reg s-p, :uk cyber strategy,");
        $data = trim(":digital policies, :central databases, :reporting protocols, :standards, :ai hub, :aml, :con. tape, :crr 430c, :esg, :iso20022, :market data, :privacy, :fines");
        $digitalAssets = trim(":cbdc, :crypto assets, :crypto currency, :dlt, :stablecoin, :reporting, :market rules, :mica, :mifid ii, :mifid, :ncb innovation, :aml, :marketing, :transparency");
        $OpRes = trim(":business continuity, :concentration risk, :outsourcing, :oprisk, :third party risk, :cyber resilience, :dora, :dlt standards, :fed guidance, :hkma guides, :uk opres");
        $fintech = trim(":fintech, :regtech, :suptech :policy research, :digital regulatory reporting, :education, :governance, :innovation, :training");
        $fcrime = trim(":fintech, :regtech, :suptech :policy research, :digital regulatory reporting, :education, :governance, :innovation, :training");
        $cyberCount = 0;
        $dataCount = 0;
        $digitalAssetsCount = 0;
        $OpResCount = 0;
        $fintechCount = 0;
        $fcrimeCount = 0;

        for ($i = 0; $i < count($keys); $i++) {
            $cyberCount += substr_count($cyber, ':' . trim($keys[$i]) . ',');
            $dataCount += substr_count($data, ':' . trim($keys[$i]) . ',');
            $digitalAssetsCount += substr_count($digitalAssets, ':' . trim($keys[$i]) . ',');
            $OpResCount += substr_count($OpRes, ':' . trim($keys[$i]) . ',');
            $fintechCount += substr_count($fintech, ':' . trim($keys[$i]) . ',');
            $fcrimeCount += substr_count($fcrime, ':' . trim($keys[$i]) . ',');
        }
        //get percentage
        $totals = $cyberCount + $dataCount + $digitalAssetsCount + $OpResCount + $fintechCount + $fcrimeCount;
        $cyberCount = get_perc($totals,$cyberCount);
        $dataCount = get_perc($totals,$dataCount);
        $digitalAssetsCount = get_perc($totals,$digitalAssetsCount);
        $OpResCount = get_perc($totals,$OpResCount);
        $fintechCount = get_perc($totals,$fintechCount);
        $fcrimeCount = get_perc($totals, $fcrimeCount);
    
       echo json_encode("Cyber: {$cyberCount}%  Data: {$dataCount}%  Digital Assets: {$digitalAssetsCount}%  OpRes: {$OpResCount}% Fintech: {$fintechCount}% Fin' Crime: {$fcrimeCount}%");
    }
    public function theme() {
        $_POST = json_decode(file_get_contents("php://input"), true);
    
        //check theme
      $this->checkTheme($_POST['found_keys']);
       

    }
}
