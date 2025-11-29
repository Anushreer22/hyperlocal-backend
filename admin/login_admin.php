<?php
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

session_start();

if ($_POST['email'] === 'admin@hyperlocal.com' && $_POST['password'] === 'admin123') {
    $_SESSION['admin_id'] = 1;
    $_SESSION['admin_email'] = 'admin@hyperlocal.com';
    
    // ACTUAL REDIRECT
    header("Location: https://anushreer22.github.io/hyperlocal-marketplace/admin/dashboard.html");
    exit();
} else {
    echo "Use: admin@hyperlocal.com / admin123";
}
?>
