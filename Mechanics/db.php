<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_portfolio';

// Create connection
$db = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
