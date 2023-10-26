<?php

namespace Chungu\Controllers;

use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Validator;

class QouteController extends Controller {
    public function sendQoute() {

        $validator = new Validator();
        $request = new Request();

        sleep(4);

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

        $this->json(['success' => true, "repost" => $request->all()]);
    }
}
