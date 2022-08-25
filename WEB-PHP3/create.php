<?php
$conn = mysqli_connect("localhost","root","111111","opentutorials");
//mysqli접속함수  접속포트    유저명  비밀번호  데이터베이스명
//PHP언어로 MYSQL에 접속

//목록 리스트 불러오기
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
//id값이 있을때만 실행.
if(isset($_GET['id']))
{
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = $row['title'];
  $article['description'] = $row['description'];

}

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
