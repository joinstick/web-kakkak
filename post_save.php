<?php
session_start();
include 'connect.php';
$content = $_POST['comment'];
$post_id = $_GET['id'];
echo $_SESSION['username'] ;
//        echo "hello";

$sql = "select * from user where login = '{$_SESSION['username']}'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $user_id = $row['id'];
}

$query = "insert into comment(content,post_date,user_id,post_id) ";
$query .= "values ('$content',now(),$user_id,$post_id)";
$res = mysqli_query($conn,$query);
if($res){
    header('location:index.php');
    exit(0);
    //        echo "เพิ่ม comment สำเร็จ";
}else{
    echo "ไม่สามารถเพิ่มข้อมูลได้";
}
?>