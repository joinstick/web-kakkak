<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['id'])||$_SESSION['role']=='m'){   //ดักให้ไม่สามารถเข้ามาหน้านี้ได้ ถ้ายังไม่ login
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ลบแล้วนะ</title>
<!--        <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <style>
            header{
                /*          border: 1px solid black;*/
                text-align: center;
/*                font-family: 'Charmonman', cursive;*/
                font-size: 22;
/*                color: #fff;*/
            }
            body{
                text-align: center;
/*                background-color: #5c85d6;*/
            }   
        </style>
    </head>
    <header> 
        <div class="h container">
            <div class="h row">
                <div class="col-12"> 
                    <h2 style="margin:20px;">Webboard KakKak</h2></div>
            </div>
        </div>
        <hr>
    </header>
    <body>
        <?php
        if(isset($_SESSION['role'])=='a'){
            $p = $_GET['p'];
            $del_post = "delete from post where id = {$p}";
            $del_p = mysqli_query($conn,$del_post);
            $del_comment = "delete from comment where post_id = {$p}";
            $del_c = mysqli_query($conn,$del_comment);
            header('location:index.php');
//            echo " ลบกระทู้ที่ {$p} เรียบร้อยแล้วจ้าาาา <br>";
//            header("refresh:3; url=index.php");
//           exit(0);
        }
        else{
            echo "คุณไม่ได้รับสิทธิ์เข้าถึงการจัดการข้อมูล<br>";
        }
        ?>
        <a href="index.php">กลับสู่หน้าหลัก</a>
    </body>
</html>