<?php
    session_start();
    include 'connect.php';
    $content = $_POST['comment'];
    $sql = "select * from post where user_id in (select id from user where login = '{$_SESSION['username']}')";
    $result = mysqli_query($conn,$sql);
     echo $_SESSION['username'] ;
    $row = mysqli_fetch_assoc($result);
        echo "hello";
        $user_id = $row['user_id'];
        $post_id = $row['id'];
       if(!$post_id and !$user_id){
           $post_id = 0;
           $sql = "select * from user where login = '{$_SESSION['username']}'";
           $result = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($result)){
               $user_id = $row['id'];
           }
       
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