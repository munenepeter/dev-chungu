<?php

namespace Chungu\Controllers;

use Chungu\Models\Li;

class LegislativeController extends Controller {
    public function index() {
        return view('leg-initia');
    }
    public function allLis() {
        echo $this->json(Li::all());
    }
}
