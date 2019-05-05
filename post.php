<?php
session_start();
include 'connect.php';
?> 
<html>
    <head>
        <meta charset="utf-8"/>
        <title>กระทู้จ้า</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <style>
            header{
                /*          border: 1px solid black;*/
                text-align: center;
                /*                font-family: 'Charmonman', cursive;*/
                /*               font-family: 'Bungee Shade', cursive;*/
                font-family: 'Montserrat Subrayada', sans-serif;
                padding-top: 10px;
                font-size: 34px;

                background-color: rgba(0,0,0,0.07);
            }
            .b{
                background-color: rgba(0,0,0,0.2);
            }
            body{
                /*                background-color:#5c85d6;*/
                text-align: center;
                background-image: url(../wb_5921600172/img/bg6.jpg);
                background-size: cover;
            }
            .s row{
                display: block;
                margin: auto;
            }
            .one-row{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .cc a {
                font-size: 16px;
            }
        </style>

        <script type="text/javascript">
            function func1(){
                 alert('เพิ่มความคิดเห็นเรียบร้อย');
            }
            function func2(){
                 alert('กรุณา login ก่อนแสดงความคิดเห็น');
            }
        </script>

    </head>
    <header>
        <p style="margin:5px;">Webboard KakKak</p>

        <hr>
    </header>
    <body>

        <div class="cc container">
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
            <div class="container">
                <div class="row">
                        <?php
                                        $n = $_GET['m'];
                                        $sql = "select * from post join user on post.user_id=user.id where post.id = {$n}";
                                        $result = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $title = $row['title'];
                                            $content = $row['content'];
                                            $post_date = $row['post_date'];
                                            $username = $row['login'];
                                        }
                        ?>
                        <div class="col-md-7">
                        <div class="card text-left" style="margin:10px;">
                            <h5 class="card-header"><?=$title?></h5>
                            <div class="card-body">
                                <p class="card-text"><?=$content?></p><br>
                                <p class="card-text"><?=$username.'&nbsp&nbsp-&nbsp&nbsp'.$post_date?></p>
                            </div>
                        </div>
                        
                                                   <?php
                            $sql = "select * from comment join user on comment.user_id=user.id where comment.post_id = {$n} order by post_date asc";
                                        $res = mysqli_query($conn,$sql);
                                        $i=1;
                                        while($row = mysqli_fetch_assoc($res)){
                                            $content = $row['content'];
                                            $post_date = $row['post_date'];
                                            $username = $row['login']; 
                        ?>

                        <div class="card text-left" style="background-color: rgba(0,0,0,0.1);margin-top:10px;margin-bottom:10px;margin-left:60px;margin-right:10px;">
                            <h5 class="card-header">ความคิดเห็นที่ <?=$i?></h5>
                            <div class="card-body">
                                <p class="card-text"><?=$content?></p><br>
                                <p class="card-text"><?=$username.'&nbsp&nbsp-&nbsp&nbsp'.$post_date?></p>
                            </div>
                        </div>

                        <?php   $i++;     }
                        ?>
                        
                    </div>
                    <div class="col-md-5">
                            
                       
                              <div class="card text-left" style="background-color: rgba(0,0,0,0.1);margin:10px;">
                            <form action="post_save.php?id=<?=$n?>" method="post">
                                <div class="card-body">
                                    <div class="b form-control-sm" style="margin-bottom:10px;color:#fff;">
                                        แสดงความคิดเห็น :
                                    </div>
                                    <div class="form-group">
                                        
                                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="6" cols="20" style="background-color: rgba(0,0,0,0.07);color:#fff;" required></textarea>
                                    </div>
                                    
                                    <div class="text-center">
                               <?php         if(!isset($_SESSION['username'])){  ?>
                                           <button type="submit" class="btn btn-outline-danger rounded-pill" onclick="func2();">ส่งข้อความ</button>
                              <?php          }else{ ?>
                                           <button type="submit" class="btn btn-outline-danger rounded-pill" onsubmit="func1();">ส่งข้อความ</button>
                                    </div>
                            <?php } ?>
                                 
                                               
                                </div>
                            </form>
                        </div>
                          
                    </div>
                </div>
                
            </div>
            
        
        <br>
    </body>
</html>