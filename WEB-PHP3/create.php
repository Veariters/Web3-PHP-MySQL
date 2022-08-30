<?php
//1. mysqli접속함수
$conn = mysqli_connect("localhost","root","111111","opentutorials");
//                      접속포트    유저명  비밀번호  데이터베이스명
//PHP언어로 MYSQL에 접속

//2. 목록 리스트 불러오기
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn,$sql);
$list = '';

while ($row = mysqli_fetch_array($result))
{
  $escaped_title = htmlspecialchars($row['title']);
 //htmlspecialchars : 해당 함수 내에있는 <, > 과 같이 특수한역할이 있는 문자의 역할을 해제함.
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, WEB'
  );
  //id값이 없으면 (홈화면) => 기본 메세지 출력


?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</h1>

    <ol>
      <?=$list?>
    </ol>
    <form action="process_create.php" method="post">
      <p>
        <input type="text" name="title" placeholder="title">
      </p>
      <p>
        <textarea name="description" placeholder="description" rows="8" cols="80"></textarea>
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
  </body>
</html>
