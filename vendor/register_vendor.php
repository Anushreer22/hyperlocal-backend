<?php
// CORS headers
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

include '../inc/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shop_name = pg_escape_string($conn, $_POST['shop_name']);
    $owner_name = pg_escape_string($conn, $_POST['owner_name']);
    $email = pg_escape_string($conn, $_POST['email']);
    $phone = pg_escape_string($conn, $_POST['phone']);
    $address = pg_escape_string($conn, $_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Handle file upload with absolute path
    $license_dir = __DIR__ . '/../uploads/licenses/';
    
    // Create directory if it doesn't exist
    if (!is_dir($license_dir)) {
        mkdir($license_dir, 0755, true);
    }
    
    $license_file = '';
    if (isset($_FILES['license_file']) && $_FILES['license_file']['error'] == 0) {
        $file_tmp = $_FILES['license_file']['tmp_name'];
        $file_name = 'license_' . time() . '_' . rand(1000,9999) . '.pdf';
        $license_file = $license_dir . $file_name;
        
        if (move_uploaded_file($file_tmp, $license_file)) {
            // Success - store relative path in database
            $license_file = 'uploads/licenses/' . $file_name;
        } else {
            echo "File upload failed. Check directory permissions.";
            exit;
        }
    }
    
    // Insert into database
    $query = "INSERT INTO vendors (shop_name, owner_name, email, phone, address, password, license_file, status) 
              VALUES ($1, $2, $3, $4, $5, $6, $7, 'pending')";
    $result = pg_query_params($conn, $query, array($shop_name, $owner_name, $email, $phone, $address, $password, $license_file));
    
    if ($result) {
        echo "Registration successful! Waiting for admin approval.";
    } else {
        echo "Registration failed: " . pg_last_error($conn);
    }
}
?>
