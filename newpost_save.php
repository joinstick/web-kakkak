<?php
session_start();
include "connect.php";
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $cate = $_POST['cate'];
    $username = $_SESSION['username'];
    $q_user_id = "select * from user where login = '{$username}' ";
    $query = mysqli_query($conn,$q_user_id);


    if($query){
        while($row = mysqli_fetch_array($query)){
            $user_id = $row['id'];
            echo $user_id;
            $sql = "insert into post(title,content,post_date,cat_id,user_id) ";
            $sql .="values ('$title','$content', now(),$cate,$user_id)";
            $result = mysqli_query($conn,$sql);
            if($result){
                header("location:index.php");
                exit(0);
            }
        }

    }else{
        echo "<br>ไม่สามารถเพิ่มข้อมูลได้<br>";
    }
}
?>