<?php
/**
 * Created by PhpStorm.
 * User: Denisa
 * Date: 3/14/2017
 * Time: 7:14 PM
 */

function connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "academie";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>