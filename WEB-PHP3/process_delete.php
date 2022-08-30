<?php
$conn = mysqli_connect('localhost', 'root', '111111' , 'opentutorials');

settype($_POST['id'], 'integer'); // ID번호를 항상 인트형 정수로.
$filtered = array(
 'id'=>mysqli_real_escape_string($conn,$_POST['id']),
);


//접속함수
$sql="DELETE FROM topic WHERE id = {$filtered['id']} ";

//sql문 id는 autoincrement로 자동부여, title,description,created 값은
//파라미터에서 전송받은 title description값과 mysql함수로 얻어낸 현재시각.

$result = mysqli_query($conn, $sql);
// 쿼리문 실행 , 접속함수 , sql문

if($result === false)
{
  echo '삭제하는 과정에 문제가 발생했습니다. 관리자에게 문의해주세요.';
  error_log(mysqli_error($conn));
}
else
{
  echo '삭제에 성공했습니다.<br> <a href="index.php">돌아가기</a>';
}

 ?>
