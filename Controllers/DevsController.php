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
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            echo $this->json("Fail", ["message" => "Only POST is allowed"]);
            return;
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            echo $this->json("Fail", ["message" => "Seems like your params are empty"]);
            return;
        }
        foreach ($this->users as $user) {
            if (in_array($username, $user) && in_array($password, $user)) {
                echo $this->json("Ok", ["message" => "Success Login", ["user" => $user]]);
                return;
            } else {
                echo $this->json("Fail", ["message" => "Wrong Credentials"]);
                return;
            }
        }
    }
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            echo $this->json("Fail", ["message" => "Only POST is allowed"]);
            return;
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
                echo $this->json("Ok", ["message" => "Successfully updated user with an id: $id"], ["user" => $user]);
                return;
            } else {
                echo $this->json("Ok", ["message" => "No user with $id"]);
                return;
            }
        }
    }
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            echo $this->json("Fail", ["message" => "Only POST is allowed"]);
            return;
        }
        foreach ($this->users as $user) {
            if (in_array((int)$id, $user)) {
                $user = '';
                echo $this->json("Ok", ["message" => "Successfully deleted user with an id: $id"], ["user" => $user]);
                return;
            } else {
                echo $this->json("Ok", ["message" => "No user with $id"]);
                return;
            }
        }
    }
}
