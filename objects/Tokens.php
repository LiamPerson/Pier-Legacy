<?php

class Tokens {

    // The value that represents the token.
    public $string = "";

    public function __construct() {
        $this->generateToken();
    }

    public function generateToken() {
        $this->string = md5(time() + rand(0, 1024));
    }

    public static function _GetTokenString() : string {
        $token = new Tokens();
        return $token->string;
    }
}