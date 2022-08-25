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
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, WEB'
  );
  //id값이 없으면 (홈화면) => 기본 메세지 출_

if(isset($_GET['id']))
{
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = $row['title'];
  $article['description'] = $row['description'];
}
//id값이 있을때만 실행.
//게시글 배열 article의 타이틀 = 해당 id값의 타이틀
//게시글 배열 article의 내용 = 해당 id값의 내용


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

    <a href="create.php">create</a>

    <h2><?=$article['title']?></h2>
    <?=$article['description']?>

  </body>
</html>
