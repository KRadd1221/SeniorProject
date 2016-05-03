<?php
$servername = "localhost";
$username = "kradd1221";
$password = "";
$dbname = "majorCourses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


