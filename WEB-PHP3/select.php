<?php
$conn = mysqli_connect("localhost","root","111111","opentutorials");
//mysqli접속함수  접속포트    유저명  비밀번호  데이터베이스명
//PHP언어로 MYSQL에 접속

//1 row
echo "<h1>Single row</h1>";
$sql = "SELECT * FROM topic WHERE id = 3";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

// all row
echo "<h1>Multi row</h1>";
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result))
{
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
}
 //PHP는 NULL = FALSE다.
 //값이 비어있다면 NULL을 리턴하므로,
 //= FALSE가되어서 반복을 중지한다.






 ?>
