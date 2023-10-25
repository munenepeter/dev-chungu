<?php

namespace Chungu\Controllers;


class DevsController extends Controller {

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
        [
            "id"  => 3,
            "names" => "Abzed",
            "username" => "abzed_mzae",
            "password" => "PAs*word",
            "email" => "abzed@chungu.co.ke",
            "address" => "Nairobi",
            "age" => 97
        ],
        [
            "id"  => 4,
            "names" => "Dorothy",
            "username" => "dorothy",
            "password" => "PAs*word",
            "email" => "dorothy@chungu.co.ke",
            "address" => "Nairobi",
            "age" => 26
        ]
    ];

    public function index() {

        return view('api');
    }
    public function users() {
        $this->json(["users" => $this->users]);
    }
    public function show($id) {
        foreach ($this->users as $user) {
            if (in_array((int)$id, $user)) {
                $this->json(["user" => $user]);
            } else {
                $this->json(["message" => "No user with $id"], 404);
            }
        }
    }
    public function signin() {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->json(["message" => "Only POST is allowed"], 405);
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            $this->json(["message" => "Seems like your params are empty"], 400);
        }
        foreach ($this->users as $user) {
            if (in_array($username, $user) && in_array($password, $user)) {
                $this->json(["message" => "Success Login", ["user" => $user]]);
            } else {
                $this->json(["message" => "Wrong Credentials"], 401);
            }
        }
    }
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->json(["message" => "Only POST is allowed"], 405);
        }
        foreach ($this->users as $user) {
            if (in_array((int)$id, $user)) {
                $user = array_map(function ($user) {
                    $user["names"] = isset($_POST['names']) ? $_POST['names'] : $user["names"];
                    $user["username"] = isset($_POST['username']) ? $_POST['username'] : $user["username"];
                    $user["password"] = isset($_POST['password']) ? $_POST['password'] : $user["password"];
                    $user["email"] = isset($_POST['email']) ? $_POST['email'] : $user["email"];
                    $user["address"] = isset($_POST['address']) ? $_POST['address'] : $user["address"];
                    $user["age"] = isset($_POST['age']) ? (int)$_POST['age'] : $user["age"];
                    return $user;
                }, $user);
                $this->json(["message" => "Successfully updated user with an id: $id", "user" => $user], 200);
            } else {
                $this->json(["message" => "No user with $id"], 404);
            }
        }
    }
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->json(["message" => "Only POST is allowed"], 405);
        }
        foreach ($this->users as $user) {
            if (in_array((int)$id, $user)) {
                $user = '';
                $this->json(["message" => "Successfully deleted user with an id: $id", "user" => $user]);
            } else {
                $this->json(["message" => "No user with $id"], 404);
            }
        }
    }
}
