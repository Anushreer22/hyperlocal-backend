<?php
// CORS headers
header("Access-Control-Allow-Origin: https://anushreer22.github.io");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { exit(0); }

// PostgreSQL configuration for Render
$host = "dpg-d4l504k9c44c73fafet0-a";
$dbname = "hyperlocal_db_b6mj";
$username = "hyperlocal_db_b6mj_user";
$password = "hPacFVyUs7Zoy9lGkdaFYEG3DdrEqyph";
$port = "5432";

// Create PostgreSQL connection
$conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";
$conn = pg_connect($conn_string);

if (!$conn) {
    die("Database connection failed: " . pg_last_error());
}
?>
