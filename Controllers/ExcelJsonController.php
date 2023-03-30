<?php

namespace Chungu\Controllers;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class ExcelJsonController {

    protected $headers = [
        "issuing_body", "document_name", "page_url", "extracted_at", "jurisdiction", "effective_date",
        "public_response_date", "document_type1", "document_type2", "document_type3", "document_type4",
        "document_type5"
    ];

    private $jsonFilePath = __DIR__ . "/../static/files/json/";


    public function index() {

        return view('excel-to-json');
    }

    private function getArray($file) {

        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file);

        $headers = $spreadsheet->getActiveSheet()->rangeToArray('A1:L1', "", FALSE, TRUE, false)[0];
        //Should change to have only occupied cells 
        //But for now will add a dangerous 'safe no 10
        $data = $spreadsheet->getActiveSheet()->rangeToArray('A2:L10', "", FALSE, TRUE, false);

        //remove empty cells
        for ($i = 0; $i <= 10; $i++) {
            if (!empty($data[$i][0])) {
                continue;
            } else {
                unset($data[$i]);
            }
        }

        //remove nulls & combine the headers & data
        foreach ($data as $row) {
            $data = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $row);

            $combinedData[] = array_combine($this->headers, $data);
        }

        return $combinedData;
    }

    private function randomString() {
        $characters = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $randstring = [];
        for ($i = 0; $i < 24; $i++) {
            array_push($randstring, $characters[rand(0, count($characters) - 1)]);
        }
        return implode("", $randstring);
    }


    private function convertDate($exceldate) {
        if (empty($exceldate)) return "";
        $UNIX_DATE = ((int)$exceldate - 25569) * 86400;
        return gmdate("d/m/Y", $UNIX_DATE);
       // return Date::excelToDateTimeObject($exceldate)->date;
    }

    //consolidate all the DTs in one line
    private function consolidateDTs(...$v) {
        $dts = [];
        for ($i = 0; $i < count($v); $i++) {
            if ($i == 0) {
                $dts[] = $v[$i];
                continue;
            }
            if ($v[$i] !== "") {
                array_push($dts, $v[$i]);
            }
        }
        return implode(", ", $dts);
    }



    private function writeJson($jsonData) {

        $random_letter = chr(rand(65, 90));
        //create a random letter for each of the files downloaded
        //to conserve the server resources we will just use 1 name for all files
        $fileName = "IB_" . date("Ymd");
        $$fileName = trim($fileName);

        //write to a file

        $jsonfile = "{$$fileName}";
        $jsonfilePath = $this->jsonFilePath . "{$$fileName}";

        $file = fopen($jsonfilePath, 'w');
        //unescape the slashes
        fwrite($file, json_encode($jsonData, JSON_UNESCAPED_SLASHES));
        fclose($file);

        //delete old file from server
        // $oldfile  = "IB_" .date('Ymd', (strtotime('-1 day', strtotime(date('Ymd')))));
        // delete_file($this->jsonFilePath . $$oldfile);

        //check if the file exists so as to return a response

        if (file_exists($jsonfilePath)) {
            $data = ['file' => $jsonfile, 'text' => "Your json file is ready and will be downloaded as <a class=\"text-purple-600 hover:underline\" href='/projects/jwg/excel-to-json/view/$jsonfile' target=\"_blank\">$jsonfile</a>, also you can click <a class=\"text-purple-600 hover:underline\" href='/projects/jwg/excel-to-json/view/$jsonfile' target=\"_blank\">here</a> to see the contents"];
        } else {
            $data = ['text' => "Error: Something happened and we could not create the .json file"];
        }

        echo json_encode($data);
    }
    public function download() {
        $path = $this->jsonFilePath . trim($_GET['file']);
        //Clear the cache

        //Check the file path exists or not
        if (file_exists($path)) {

            //Define header information
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($path) . '"');
            header('Content-Length: ' . filesize($path));
            header('Pragma: public');

            //Clear system output buffer
            flush();

            //Read the size of the file
            readfile($path, true);
            logger("Info", "Downloaded a file - " . trim($_GET['file']));

            //Terminate from the script
            die();
        } else {
            logger("Error", "File path does not exist");
            echo "Error on the server/developer: File path does not exist";
        }
    }
    private function checkUploadedFile() {
        //check if there is a file
        if (empty($_FILES['excelFile'])) {
            http_response_code(400);
            echo json_encode("No file has been provided!");
            exit;
        }

        // switch ($_FILES['excelFile']['error']) {
        //     case 0:
        //         logger("Debug", "File Has been uploaded successfully");
        //         break;
        //     case 1:
        //         logger("Error", "The file uploaded is too large");
        //         http_response_code(400);
        //         echo json_encode("The file uploaded is too large");
        //         break;
        //     case 3:
        //         logger("Error", "The uploaded file was only partially uploaded.");
        //         http_response_code(400);
        //         echo json_encode("The uploaded file was only partially uploaded.");
        //         break;
        //     case 4:
        //         logger("Error", "No file was uploaded.");
        //         http_response_code(400);
        //         echo json_encode("No file was uploaded.");
        //         break;
        //     case 6:
        //         logger("Error", "Missing a temporary folder.");
        //         http_response_code(400);
        //         echo json_encode("Missing a temporary folder.");
        //         break;
        //     case 7:
        //         logger("Error", "Failed to write file to disk.");
        //         http_response_code(400);
        //         echo json_encode("Failed to write file to disk.");
        //         break;
        //     default:
        //         logger("Error", "Beats the hell out me, but something happened!");
        //         http_response_code(400);
        //         echo json_encode("Beats the hell out me, but something happened!");
        // }
    }
    public function create() {
        $this->checkUploadedFile();
        //get data from file
        $rowsAndHeaders = $this->getArray($_FILES['excelFile']["tmp_name"]);

        //And the extra values & format the excel dates
        $reformatedData = array_map(function ($v) {
            $v['extracted_at'] = $this->convertDate($v['extracted_at']);
            $v['effective_date'] = $this->convertDate($v['effective_date']);
            $v['public_response_date'] = $this->convertDate($v['public_response_date']);
            $v['document_type'] = $this->consolidateDTs($v['document_type1'], $v['document_type2'], $v['document_type3'], $v['document_type4'], $v['document_type5']);
            $v['spider_id'] = $this->randomString();
            return $v;
        }, $rowsAndHeaders);

        //Add the final format
        $final = [
            "total" => count($reformatedData),
            "articles" => $reformatedData
        ];
        logger("Info", "Succesfully parsed  " . $_FILES['excelFile']['name'] . " of " . $_FILES['excelFile']['type']);
        //finally write to file
        $this->writeJson($final);
    }
    private function getIssuer() {
        //TODO
    }
    public function view($file) {
        if (!file_exists($this->jsonFilePath . $file)) {
            echo  "File does not exist";
            logger("Debug", "File trying to be read does not exist - $file");
        }
        echo file_get_contents($this->jsonFilePath . $file);
    }
}
