<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $conn->set_charset('utf-8');

// $conn->close();
