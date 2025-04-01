<?php
// update.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id              = intval($_POST['id']);
    $user_name       = $_POST['user_name'];
    $diagnosis_result = $_POST['diagnosis_result'];
    
    $stmt = $conn->prepare("UPDATE diagnosis_results SET user_name = ?, diagnosis_result = ? WHERE id = ?");
    $stmt->bind_param("ssi", $user_name, $diagnosis_result, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "수정 중 오류 발생: " . $stmt->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
