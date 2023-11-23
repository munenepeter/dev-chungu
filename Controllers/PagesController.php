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
    public function getLinks() {
        return view('get-links');
    }
    public function caseLaw() {
        return view('case-law');
    }
    public function boardRoom() {
        return view('board-room');
    }
    public function poems() {
        return view('poems');
    }
}
