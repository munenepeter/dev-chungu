<?php

namespace Chungu\Controllers;


class DevsController {

    public $users =   [
        [
            "id"  => 1,
            "names" => "Peter Munene",
            "username" => "pmunene",
            "password" => "PAs*word",
            "email" => "pmunene@chungu.co.ke",
            "address" => "Nairobi",
            "age" => 89
        ],
        [
            "id"  => 2,
            "names" => "Kimberly",
            "username" => "kimkim",
            "password" => "PAs*word",
            "email" => "kimkim@chungu.co.ke",
            "address" => "Nairobi",
            "age" => 24
        ],
    ];

    private function json($status, ...$values) {
        header('Content-Type: application/json; charset=utf-8');
        return json_encode(["status" => $status, "data" => $values]);
    }
    public function index() {
        echo $this->json("Ok", ["message" => "Success"]);
    }
    public function users() {

        echo $this->json("Ok", ["users" => $this->users]);
    }
    public function show($id) {
        foreach ($this->users as $user) {
            if (in_array((int)$id, $user)) {
                echo $this->json("Ok", ["user" => $user]);
                return;
            } else {
                echo $this->json("Ok", ["message" => "No user with $id"]);
                return;
            }
        }
    }
    public function signin() {
       $username = $_POST['username'];
       $password = $_POST['password'];
    }
    public function update($id) {
        # code...
    }
    public function delete($id) {
        # code...
    }
}
