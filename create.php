<?php
// create.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepared Statement를 사용하여 SQL Injection 방지
    $stmt = $conn->prepare("INSERT INTO diagnosis_results (user_name, diagnosis_result) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_name, $diagnosis_result);
    
    $user_name       = $_POST['user_name'];
    $diagnosis_result = $_POST['diagnosis_result'];
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "입력 중 오류 발생: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>진단 결과 입력</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script>
    function validateForm() {
      var name = document.forms["createForm"]["user_name"].value;
      var result = document.forms["createForm"]["diagnosis_result"].value;
      if (name == "" || result == "") {
        alert("모든 필드를 입력하세요.");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
<div class="container mt-5">
  <h2>진단 결과 입력</h2>
  <form name="createForm" method="post" action="create.php" onsubmit="return validateForm();">
    <div class="form-group">
      <label>사용자 이름</label>
      <input type="text" name="user_name" class="form-control" placeholder="이름을 입력하세요" required>
    </div>
    <div class="form-group">
      <label>진단 결과</label>
      <textarea name="diagnosis_result" class="form-control" placeholder="진단 결과를 입력하세요" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">저장</button>
    <a href="index.php" class="btn btn-secondary">취소</a>
  </form>
</div>
</body>
</html>
