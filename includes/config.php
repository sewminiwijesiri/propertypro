<?php


$conn = new mysqli("localhost", "root", "", "propertypro");

if ($conn->connect_error) {
    die("connection error" . $conn->connect_error);

}



?>