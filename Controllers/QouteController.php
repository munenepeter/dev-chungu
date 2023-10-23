<?php

namespace Chungu\Controllers;

use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Validator;

class QouteController extends Controller {
    public function sendQoute() {

        $validator = new Validator();
        $request = new Request();

        $validator->validate($request,[
            'name' => 'required',
            'email' => 'required|email|disposable',
            'project_title' => 'required|string',
            'project_type' => 'required|string',
            'project_description' => 'string'
        ]);

       
    }
}
