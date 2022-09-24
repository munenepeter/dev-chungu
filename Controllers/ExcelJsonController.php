<?php

namespace Chungu\Controllers;


class ExcelJsonController {

    protected $headers = [
        "issuing_body",
        "document_name",
        "page_url",
        "extracted_at",
        "jurisdiction",
        "effective_date",
        "public_response_date",
        "document_type1",
        "document_type2",
        "document_type3",
        "document_type4",
        "document_type5"
    ];

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
            if (!empty($datas[$i][0])) {
                continue;
            } else {
                unset($datas[$i]);
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
        //return Date::excelToDateTimeObject($exceldate)->date;
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

    public function create() {

        //get data from file
        $rowsAndHeaders = $this->getArray(); 

        //And the extra values & format the excel dates
        $data = array_map(function ($v) {
            $v['extracted_at'] = $this->convertDate($v['extracted_at']);
            $v['effective_date'] = $this->convertDate($v['effective_date']);
            $v['public_response_date'] = $this->convertDate($v['public_response_date']);
            $v['document_type'] = $this->consolidateDTs($v['document_type1'], $v['document_type2'], $v['document_type3'], $v['document_type4'], $v['document_type5']);
            $v['spider_id'] = $this->randomString();
            return $v;
        }, $rowsAndHeaders);

        //Add the final format
        $final = [
            "total" => count($data),
            "articles" => $data
        ];

       
    }
}
