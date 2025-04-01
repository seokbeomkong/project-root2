<?php
// edit.php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT id, user_name, diagnosis_result FROM diagnosis_results WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "해당 진단 결과를 찾을 수 없습니다.";
    exit();
}
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>진단 결과 수정</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script>
    function validateForm() {
      var name = document.forms["editForm"]["user_name"].value;
      var result = document.forms["editForm"]["diagnosis_result"].value;
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
  <h2>진단 결과 수정</h2>
  <form name="editForm" method="post" action="update.php" onsubmit="return validateForm();">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
      <label>사용자 이름</label>
      <input type="text" name="user_name" class="form-control" value="<?php echo htmlspecialchars($row['user_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group">
      <label>진단 결과</label>
      <textarea name="diagnosis_result" class="form-control" required><?php echo htmlspecialchars($row['diagnosis_result'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">수정</button>
    <a href="index.php" class="btn btn-secondary">취소</a>
  </form>
</div>
</body>
</html>
