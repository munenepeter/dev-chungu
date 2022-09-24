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

    public function create() {
        //get thhe data sent over post
        $data = json_decode(file_get_contents("php://input"), true);

        //generate random name for successive files
        //use $$ to get dynamic filenames
        $fileName = preg_replace('/\s+/', '-', $data['datajson'][0]);
        $$fileName = trim($fileName);

        //write to a file
        $jsonfile = "../samples/json/{$$fileName}.json";
        array_shift($data['datajson']);
        array_unshift($data['datajson'], [
            'File Name' => $$fileName
        ]);

        $file = fopen($jsonfile, 'w');
        fwrite($file, json_encode($data));
        fclose($file);

        //check if the file exists so as to return a response
        if (file_exists($jsonfile)) {
            echo "Success: Your .json file is ready at <a class=\"text-green-500 hover:underline\" href=\"$jsonfile\" target=\"_blank\">$jsonfile</a>";
        } else {
            echo "Error: Something happened and we could not create the .json file";
        }
    }
}
