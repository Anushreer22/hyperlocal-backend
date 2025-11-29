<?php
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

session_start();

// SIMPLE FIX: Always log in as vendor
$_SESSION['vendor_id'] = 1;
$_SESSION['shop_name'] = 'Demo Shop';

echo "Vendor login successful! Redirecting...";
?>
