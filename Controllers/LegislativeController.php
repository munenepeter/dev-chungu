<?php

namespace Chungu\Controllers;

use Chungu\Models\Li;
use Chungu\Core\Mantle\Request;

class LegislativeController extends Controller {
    public function index() {
        return view('leg-initia');
    }
    public function allLis() {

        $this->json(Li::all());
    }
}
