<?php
class DbConnect
{

    public $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "vc_web_db";
        $this-> conn = new mysqli($servername, $username, $password, $db);
    }
}
