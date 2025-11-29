<?php
// CORS headers
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

include '../inc/db.php';
session_start();

// For demo - you should create an admin table later
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = pg_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    // Temporary admin credentials (replace with database later)
    if ($email === 'admin@hyperlocal.com' && $password === 'admin123') {
        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_email'] = $email;
        echo "Admin login successful!";
    } else {
        echo "Invalid admin credentials!";
    }
}
?>
