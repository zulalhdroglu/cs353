<?php
define('SERVER', "localhost");
define("USER","root");
define("PASS","Playstation2001");
define("NAME", "school_library");
class ConnectToDB {
    public static function getConnection() {
        $conn = new mysqli(SERVER, USER,PASS, NAME);
        // Check for connection error
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        return $conn;
    }
}
?>