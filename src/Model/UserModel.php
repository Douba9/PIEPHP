<?php

class UserModel {
    public function Connect(){
        echo __CLASS__."[OK]".PHP_EOL;
        $servername = "localhost";
        $username = "marius";
        $password = "devauber";
        $database = "PiePhp";

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

?>