<?php

namespace Chungu\Controllers;

use Chungu\Core\Mantle\Middleware; 
use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Paginator;

class Controller {

   
    public function middleware($middleware){
       return (new Middleware)->middleware($middleware);
    }
    public function request(){
        return (new Request);
     }
    public function upload(array $file, string $location, int $max_size, array $mime_types) {
        return $this->request()->upload($file, $location, $max_size, $mime_types);
    }
    public function paginate(array $data, $per_page) {
        return Paginator::paginate($data, $per_page);
    }
    public function json($status, ...$values) {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin : *;');
        return json_encode(["status" => $status, "data" => $values]);
    }
   
}
