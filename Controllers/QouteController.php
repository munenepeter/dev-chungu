<?php

namespace Chungu\Controllers;

use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Validator;

class QouteController extends Controller {
    public function sendQoute() {
        $this->validate([
            'name' => 'alphanumeric|required',
            'email' => 'required|email|disposable',
            'project_title' => 'alphanumeric|required',
            'project_type' => 'alphanumeric|required',
            'description' => 'alphanumeric'
        ]);

        $validator = new Validator();
        $request = new Request();

        $validator->validate($request,[
            'name' => 'alphanumeric|required',
            'email' => 'required|email|disposable',
            'project_title' => 'alphanumeric|required',
            'project_type' => 'alphanumeric|required',
            'description' => 'alphanumeric'
        ]);

        echo '<pre>';
        print_r($request->all());

        dd($validator->getErrors());
    }
}
