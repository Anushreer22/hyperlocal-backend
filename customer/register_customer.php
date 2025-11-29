<?php
// CORS headers
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

include '../inc/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = pg_escape_string($conn, $_POST['name']);
    $email = pg_escape_string($conn, $_POST['email']);
    $phone = pg_escape_string($conn, $_POST['phone']);
    $address = pg_escape_string($conn, $_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Use pg_query_params for PostgreSQL
    $query = "INSERT INTO customers (name, email, phone, address, password) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, array($name, $email, $phone, $address, $password));
    
    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Registration failed: " . pg_last_error($conn);
    }
}
?>
