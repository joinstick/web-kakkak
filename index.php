<?php
session_start();
include 'connect.php';
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>หน้าแรกของฉัน</title>
        <!--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
-->     
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <style>
            header{
                text-align: center;  
                font-family: 'Montserrat Subrayada', sans-serif;
/*                font-family: 'Vast Shadow', cursive;*/
/*                font-family: 'Bungee Shade', cursive;*/
                padding-top: 10px;
                font-size: 34px;
                
                background-color: rgba(0,0,0,0.07);
            }
            body{
              
                background-image: url(../wb_5921600172/img/bg6.jpg);
                background-size: cover;
                
            }

            header .logo{
                max-width: 120px;
                height:auto;
            }
            .one-row{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .tt{
                background-color: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);

            }
            .cc a {
                font-size: 16px;
            }
            nav{
/*
background: #d8a27c; 
background: -moz-linear-gradient(-45deg, #d8a27c 0%, #c5d0d4 39%, #d5c2bc 63%, #6fa0a5 100%); 
background: -webkit-linear-gradient(-45deg, #d8a27c 0%,#c5d0d4 39%,#d5c2bc 63%,#6fa0a5 100%); 
background: linear-gradient(135deg, #d8a27c 0%,#c5d0d4 39%,#d5c2bc 63%,#6fa0a5 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d8a27c', endColorstr='#6fa0a5',GradientType=1 ); 
*/
            }
        </style>
    </head>
    <header>
                    <p style="margin:5px;">Webboard KakKak</p>
        <hr>
    </header>
    <body>
        <!-- Image and text -->
        <div class="cc container">
            <div class="navb container">
                <div class="navb row">
                    <nav class="navbar navbar-expand navbar-light bg-light form-control" >
                        <a class="navbar-brand" href="index.php">
                            <i class="fas fa-home" width="30" height="30" class="d-inline-block align-top"></i> Home
                        </a> 
                        <a class="navbar-brand" href="login.php">
                            <?php
                            if(!isset($_SESSION['id'])){ ?>
                            <div class="collapse navbar-collapse nav justify-content-end">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="navbar-brand" href="login.php">

                                            <i class="fas fa-sign-in-alt" width="30" height="30" class="d-inline-block align-top"></i> เข้าสู่ระบบ
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <?php }
                            else{ ?>
                            <!--                    <ul class="nav justify-content-end"> เอาไปไว้ท้ายสุดของ Navs--> 
                            <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <a class="navbar-brand" >
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-user-astronaut"></i><?php echo " {$_SESSION['username']}"; ?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="logout.php"><i class="fas fa-door-open"></i> ออกจากระบบ</a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </a>
                                </ul>
                            </div>
                        </a>
                    </nav>
                </div>
            </div>

            <div class="one-container container">
                <div class="one-row row">
                    <div class="col-7 form-inline">
                        หมวดหมู่ : <?php echo "&nbsp"; 

                        $query = "select * from category ";
                        $result = mysqli_query($conn,$query); ?>
                        <select name="group" class="form-control" style="background-color: rgba(0,0,0,0.07);">
                            <?php       
                            echo "<option value='0'>--ทั้งหมด--</option>";
                            while($row = mysqli_fetch_assoc($result)){
                                $id_cate = $row['id'];
                                $name_cate = $row['name'];

                                echo "<option value='{$id_cate}'>{$name_cate}</option>";
                            }

                            ?>     
                        </select>
                    </div>
                    <?php
                    if(isset($_SESSION['username'])){  ?>
                    <div class="col-5 text-right">
                        <a class="btn btn-success rounded-pill" href="newpost.php" role="button">+ สร้างกระทู้ใหม่</a>
                    </div>
                    <?php  }?>
                </div>
                <table class="table table-striped tt">
                    <tbody>
                        <?php
                        if(isset($_SESSION['role']) && $_SESSION['role']=="a"){      //admin
                            $sql = "select * from post order by post_date desc ";
                            $res = mysqli_query($conn,$sql);
                            $n=1;
                            while($row = mysqli_fetch_assoc($res)){ ?>
                        <tr>
                            <th scope="row">
                                <?php
                                $cate = $row['cat_id'];
                                $title = $row['title'];
                                $user_id = $row['user_id'];
                                $post_date = $row['post_date'];
                                $post_id = $row['id'];
                                if($cate==1){
                                    $name_cate = "เรื่องทั่วไป";
                                }else{
                                    $name_cate = "เรื่องเรียน";
                                }
                                echo "[ {$name_cate} ]&nbsp";            
                                ?>
                                <a href="post.php?m=<?=$post_id?>"><?=$title?></a><br>
                                <?php
                                    $sql_name = "select * from user where id ={$user_id}";
                                $res_name = mysqli_query($conn,$sql_name);
                                while($r = mysqli_fetch_assoc($res_name)){
                                    $username = $r['login'];
                                }  
                                echo $username."&nbsp-&nbsp";
                                echo $post_date;                                 
                                ?>

                            </th>
                            <td></td>
                            <td></td>
                            <td><a class="btn btn-danger rounded-pill" href="delete.php?p=<?=$n?>" role="button"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php        $n++;
                            }
                        } 
                        else{                                                        //others
                            $sql = "select * from post order by post_date desc ";
                            $res = mysqli_query($conn,$sql);
                            $n=1;
                            while($row = mysqli_fetch_assoc($res)){ ?>
                        <tr>
                            <th scope="row">
                               <?php
                                $cate = $row['cat_id'];
                                $title = $row['title'];
                                $user_id = $row['user_id'];
                                $post_date = $row['post_date'];
                                $post_id = $row['id'];
                                if($cate==1){
                                    $name_cate = "เรื่องทั่วไป";
                                }else{
                                    $name_cate = "เรื่องเรียน";
                                }
                                echo "[ {$name_cate} ]&nbsp";            
                                ?>
                                <a href="post.php?m=<?=$post_id?>"><?=$title?></a><br>
                                <?php
                                    $sql_name = "select * from user where id ={$user_id}";
                                $res_name = mysqli_query($conn,$sql_name);
                                while($r = mysqli_fetch_assoc($res_name)){
                                    $username = $r['login'];
                                }  
                                echo $username."&nbsp-&nbsp";
                                echo $post_date;                                 
                                ?>
                            </th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php        $n++;
                                       }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>