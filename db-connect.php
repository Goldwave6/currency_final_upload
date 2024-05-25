<?php
$servername = "localhost";
$username = "136341_1_1";
$password = "oyH9PJLmYkti";
$dbname = "136341_1_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
