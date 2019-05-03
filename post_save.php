<?php
session_start();
include 'connect.php';
$content = $_POST['comment'];
$post_id = $_GET['id'];
if(isset($_SESSION['username'])){
    $sql = "select * from user where login = '{$_SESSION['username']}'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $user_id = $row['id'];
}

$query = "insert into comment(content,post_date,user_id,post_id) ";
$query .= "values ('$content',now(),$user_id,$post_id)";
$res = mysqli_query($conn,$query);
//     header('location:index.php');
    header("location:post.php?m={$post_id}");
    exit(0);
}else{
    //echo "ไม่สามารถเพิ่มข้อมูลได้";
    $_SESSION['comment'] = 1; 
    header("location:post.php?m={$post_id}");
}
?>