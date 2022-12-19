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

        $this->request()->validate($_POST, [
            'name' => 'required',
            'username' => 'required',
            'abbr' => 'required',
        ]);
        //create user
        LI::create([
            'username' => $this->request()->form('username'),
            'name' => $this->request()->form('name'),
            'abbr' => $this->request()->form('abbr'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);

        lilog($this->request()->form('username'). " Added ". $this->request()->form('name'));

        $this->json($_REQUEST);
    }
    public function show() {
        $this->json(Li::all());
    }
}
