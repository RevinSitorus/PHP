<?php 
// 1. Database credentials
$host = "localhost";
$username = "root";      // Default in XAMPP/WAMP
$password = "";          // Default is empty in XAMPP/WAMP
$dbname = "grade";

// 2. Create MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);
?>