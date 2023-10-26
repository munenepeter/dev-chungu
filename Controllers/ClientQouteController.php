<?php

namespace Chungu\Controllers;

use Chungu\Models\ClientQoute;
use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Validator;
use Chungu\Controllers\Controller;

class ClientQouteController extends Controller {
    public function sendQoute() {

        $validator = new Validator();
        $request = new Request();

        //   sleep(4);

        $validator->validate($request, [
            'name' => 'required',
            'email' => 'required|email|disposable',
            'project_title' => 'required',
            'project_type' => 'required',
            'project_description' => 'string'
        ]);

        if (!empty($validator->getErrors())) {
            $this->json(["errors" => $validator->getErrors()]);
        }

        ClientQoute::create([
            'name' => request('name'),
            'email' => request('email'),
            'project_title' => request('project_title'),
            'project_type' => request('project_type'),
            'project_description' => request('project_description'),
        ]);

        $this->json(['success' => true, "repost" => $request->all()]);
    }
}
