<?php

namespace Chungu\Controllers;


class DevsController {

    private function json(...$values) {
        return json_encode($values);
    }
    public function index() {
        return $this->json(["message" => "Success"]);
    }
    public function users() {
        # code...
    }
    public function show($id) {
        # code...
    }
    public function signin() {
        # code...
    }
    public function update($id) {
        # code...
    }
    public function delete($id) {
        # code...
    }
}
