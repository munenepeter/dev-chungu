<?php

namespace Chungu\Controllers;

class PagesController extends Controller {

    public function index() {
        return view('index');
    }
    public function privacy() {
        return view('privacy-policy');
    }
    public function services() {
        return view('services');
    }
}
