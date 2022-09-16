<?php

namespace Chungu\Controllers;

class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function projects() {
        $projects = [
            ['category' => 'jwg', 'name' => "scrapword", 'description' => 'Searching for the following Keywords'],
            ['category' => 'jwg', 'name' => "Excel-to-JSON", 'description' => 'Convert Excel to JSON'],
            ['category' => 'jwg', 'name' => "get-links", 'description' => 'Get Links, useful tool to get all the urls of a site']
        ];
        return view('projects', [
            'projects' => $projects
        ]);
    }

    public function privacy() {
        return view('privacy-policy');
    }
}
