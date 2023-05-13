<?php

namespace Chungu\Controllers;

class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function projects() {
        $projects = [
            ['category' => 'jwg', 'name' => "scrapword", 'description' => 'Searching for Keywords on a webpage'],
            ['category' => 'jwg', 'name' => "excel-to-json", 'description' => 'Convert an Excel doc to JSON'],
            ['category' => 'jwg', 'name' => "parser", 'description' => 'Parse docx, pdf, rtf & txt files'],
            ['category' => 'jwg', 'name' => "get-links", 'description' => 'Get all the urls of a webpage'],
            ['category' => 'jwg', 'name' => "leg-initia", 'description' => 'Search Legislative initiatives'],
            ['category' => 'devs-talk', 'name' => "api", 'description' => 'Demo API endpoints for Devs talk'],
            ['category' => 'law', 'name' => "case-law-search", 'description' => 'A simple Case Search with highlights'],
            ['category' => 'personal', 'name' => "claim", 'description' => 'A simple (insurer) Insurance system'],
            ['category' => 'personal', 'name' => "board-room", 'description' => 'A board room scheduling mini-system'],
            ['category' => 'personal', 'name' => "poems", 'description' => 'All my poems in one place :)'],
            ['category' => 'personal', 'name' => "scripts", 'description' => 'All my scripts in one place (sh & cmd)']

        ];
        return view('projects', [
            'projects' => $projects
        ]);
    }

    public function privacy() {
        return view('privacy-policy');
    }
    public function services() {
        return view('services');
    }
}
