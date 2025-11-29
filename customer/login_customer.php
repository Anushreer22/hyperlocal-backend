<?php
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

session_start();

$_SESSION['customer_id'] = 1;
$_SESSION['customer_name'] = 'Demo Customer';

// ACTUAL REDIRECT  
header("Location: https://anushreer22.github.io/hyperlocal-marketplace/customer/dashboard.html");
exit();
?>
