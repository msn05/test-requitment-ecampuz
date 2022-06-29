<?php
$dbhost     = "localhost";
$dbuser   = "root";
$dbpass   = "Akamsi123";
$dbname   = "test-ecampuz";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
  die('Koneksi Database Gagal : ' . $conn->connect_error);
}
