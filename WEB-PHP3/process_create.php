<?php
$conn = mysqli_connect('localhost', 'root', '111111' , 'opentutorials');
//접속함수
$sql="
  Insert into topic (title, description, created)
              values ('{$_POST['title']}' ,'{$_POST['description']}', NOW())
";
//sql문 id는 autoincrement로 자동부여, title,description,created 값은
//파라미터에서 전송받은 title description값과 mysql함수로 얻어낸 현재시각.

$result = mysqli_query($conn, $sql);
// 쿼리문 실행 , 접속함수 , sql문

if($result === false)
{
  echo '저장하는 과정에 문제가 발생했습니다. 관리자에게 문의해주세요.';
  error_log(mysqli_error($conn));
}
else
{
  echo '저장에 성공했습니다.<br> <a href="index.php">돌아가기</a>';
}

 ?>
