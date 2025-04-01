<?php
// db.sample.php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "diagnosis_db";

// 데이터베이스 연결 생성 
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
