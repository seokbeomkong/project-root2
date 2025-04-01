<?php
// index.php
include 'db.sample.php'; // 실제 연결 정보가 담긴 파일 (db.php는 .gitignore에 등록)
$sql = "SELECT id, user_name, diagnosis_result, created_at FROM diagnosis_results ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>진단 결과 조회</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h2>진단 결과 목록</h2>
  <a href="create.php" class="btn btn-primary mb-3">새 진단 결과 입력</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>사용자 이름</th>
        <th>진단 결과</th>
        <th>입력일</th>
        <th>액션</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['user_name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['diagnosis_result'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">수정</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
          </td>
        </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center">등록된 진단 결과가 없습니다.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>
