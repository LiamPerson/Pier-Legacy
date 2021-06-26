<?php
class Admin_Controller {

    public function __construct() {
    }

    public function test() {
        echo "hello world!";
    }

    public function helloWorld() {
        echo "hello world! :)";
    }

    public function addNewMovie() {
        s($_FILES);
    }
}