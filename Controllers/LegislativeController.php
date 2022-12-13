<?php

namespace Chungu\Controllers;

use Chungu\Models\Li;
use Chungu\Core\Mantle\Request;

class LegislativeController extends Controller {
    public function index() {
        return view('leg-initia');
    }
    public function allLis() {

        echo json_encode(Li::all());
        // logger("INFO", "I'm here  " . Request::uri());
        // logger("INFO", "Got " . count(Li::all()));
        // $this->json(Li::all());
    }
}
