<?php

namespace Chungu\Controllers;

class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function projects() {
        $projects = [
            ['category' => 'jwg', 'name' => "scrapword", 'description' => 'Searching for the following Keywords'],
            ['category' => 'jwg', 'name' => "excel-to-json", 'description' => 'Convert Excel to JSON'],
            ['category' => 'jwg', 'name' => "get-links", 'description' => 'Get Links, useful tool to get all the urls of a site'],
            ['category' => 'devs-talk', 'name' => "api", 'description' => 'Demo API endpoints for Devs talk'],
            ['category' => 'law', 'name' => "Case-Law-Search", 'description' => 'A simple Case Search with highlights'],
            ['category' => 'personal', 'name' => "clive", 'description' => 'A simple Insurance system']

        ];
        return view('projects', [
            'projects' => $projects
        ]);
    }

    public function privacy() {
        return view('privacy-policy');
    }
    public function about() {
        return view('about-us');
    }
}
