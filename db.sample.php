<?php
// db.sample.php
// 실제 데이터베이스 연결 정보는 db.php에 작성하세요.
// 이 파일은 샘플 파일로서 참고용입니다.
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "diagnosis_db";

// 데이터베이스 연결 생성 (MySQLi 사용)
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
