<?php

 $conn = mysqli_connect("localhost","root","111111","opentutorials");
//mysqli접속함수  접속포트    유저명  비밀번호  데이터베이스명
//PHP언어로 MYSQL에 접속

$sql = "
Insert into topic
(title, description, created)
value('MySQL','MySQL is ...',Now())
";

echo $sql;
$result = mysqli_query($conn,$sql);
//쿼리문 실행

if($result == false){
echo mysqli_error($conn);
}


?>
