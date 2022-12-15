<?php

namespace Chungu\Controllers;

use Chungu\Models\Li;
use Chungu\Core\Mantle\Request;

class LegislativeController extends Controller {
    public function index() {
        return view('leg-initia');
    }
    public function create() {
          //create an LI

          LI::create(
            $_REQUEST
          );
        $this->json($_REQUEST);
    }
    public function show() {
        $this->json(Li::all());
    }
 
}
