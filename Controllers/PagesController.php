<?php

namespace Chungu\Controllers;

class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function projects() {
        $projects = [
            ['category' => 'automation', 'name' => "scrapword", 'description' => 'Searching for Keywords on a webpage'],
            ['category' => 'automation', 'name' => "excel-to-json", 'description' => 'Convert an Excel doc to JSON'],
            ['category' => 'automation', 'name' => "parser", 'description' => 'Parse docx, pdf, rtf & txt files'],
            ['category' => 'automation', 'name' => "get-links", 'description' => 'Get all the urls of a webpage'],
            ['category' => 'automation', 'name' => "leg-initia", 'description' => 'Search Legislative initiatives'],
            ['category' => 'learning', 'name' => "api", 'description' => 'Demo API endpoints for Devs talk'],
            ['category' => 'law', 'name' => "case-law-search", 'description' => 'A simple Case Search with highlights'],
            ['category' => 'business', 'name' => "board-room", 'description' => 'A board room scheduling mini-system'],
            ['category' => 'business', 'name' => "poems", 'description' => 'All my poems in one place :)'],

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
