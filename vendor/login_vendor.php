<?php
// CORS headers
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

include '../inc/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = pg_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    // Use pg_query_params for PostgreSQL
    $query = "SELECT * FROM vendors WHERE email = $1 AND status = 'approved'";
    $result = pg_query_params($conn, $query, array($email));
    
    if ($result && pg_num_rows($result) > 0) {
        $vendor = pg_fetch_assoc($result);
        
        if (password_verify($password, $vendor['password'])) {
            $_SESSION['vendor_id'] = $vendor['id'];
            $_SESSION['shop_name'] = $vendor['shop_name'];
            echo "Login successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Vendor not found or not approved!";
    }
}
?>
