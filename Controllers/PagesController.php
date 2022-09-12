<?php

namespace Chungu\Controllers;

class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function signin() {
        return view('signin');
    }
    public function dashboard() {
        //check if the user is logged in
        $this->middleware('auth');

        return view('dashboard');
    }

    public function privacy() {
        return view('privacy-policy');
    }
}
