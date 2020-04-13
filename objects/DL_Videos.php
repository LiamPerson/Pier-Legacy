<?php

class DL_Videos {

    private $table = "dl_videos";
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }


}