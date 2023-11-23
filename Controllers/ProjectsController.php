<?php

namespace Chungu\Controllers;

class ProjectsController extends Controller {

    public function index() {


        $projects = [
            ['category' => 'automation', 'name' => "scrapword", 'description' => 'Searching for Keywords on a webpage'],
            ['category' => 'automation', 'name' => "excel-to-json", 'description' => 'Convert an Excel doc to JSON'],
            ['category' => 'automation', 'name' => "parser", 'description' => 'Parse docx, pdf, rtf & txt files'],
            ['category' => 'automation', 'name' => "get-links", 'description' => 'Get all the urls of a webpage'],
            ['category' => 'automation', 'name' => "leg-initia", 'description' => 'Search Legislative initiatives'],
            ['category' => 'learning', 'name' => "api", 'description' => 'Demo API endpoints for Devs talk'],
            ['category' => 'law', 'name' => "case-law-search", 'description' => 'A simple Case Search with highlights'],
            ['category' => 'personal', 'name' => "board-room", 'description' => 'A board room scheduling mini-system'],
            ['category' => 'personal', 'name' => "poems", 'description' => 'All my poems in one place :)'],

        ];
        return view('projects', [
            'projects' => $projects
        ]);
    }
}
