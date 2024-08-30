<?php

namespace Models;

class Product {
    private $data = [];

    public function __construct($data) {
        $this->setData($data);
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function __set($key, $value){
        $this->data[$key] = $value;
    }

    public function __get($key){
        return $this->data[$key] ?? null;
    }
}
