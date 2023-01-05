<?php

namespace Chungu\Controllers;

use Chungu\Models\Li;
use Chungu\Core\Mantle\Request;

class LegislativeController extends Controller {
    public function index() {
        return view('leg-initia', ["lis" => Li::all()]);
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

        lilog($this->request()->form('username') . " Added " . $this->request()->form('name'));

        $this->json("Success");
    }
    public function show() {
        $this->json(Li::all());
    }
    public function delete() {

        $this->request()->validate($_POST, [
            'liId' => 'required'
        ]);

        // var_dump(Li::delete("id", $this->request()->form('liId')));

        // exit;
        if (Li::delete("id", $this->request()->form('liId'))) {
            $this->json("Sorry couldn't delete!", 500);
        }
        
        lilog("Someone deleted an LI with an id of " . $this->request()->form('liId'));
        $this->json("Success");
    }
}
