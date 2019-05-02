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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <style>
            header{
                text-align: center;  
                font-size: 22;
            }
            body{
                background-color: #fff;
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
                background-color: #f7e6ff;

            }
            .cc a {
                font-size: 16px;
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
                        
                        $query = "select * from post";
                        $result = mysqli_query($conn,$query); ?>
<!--                    <select name="group" class="form-control">-->
<!--
//                        while($row = mysqli_fetch_assoc($result)){
//                            $cate = $row['cat_id'];
//                            if($cate==1){
//                                $name_cate = 'เรื่องทั่วไป';
//                            }else{
//                                $name_cate = 'เรื่องเรียน';
//                            } 
-->
<!--
//                            echo "<option value='$cate'>$name_cate</option>";
//                       }
-->
                        
<!--                        </select>-->
                        
                        <select name="group" class="form-control">
                            <option value="aa">--ทั้งหมด--</option>
                            <option value="a">เรื่องทั่วไป</option>
                            <option value="b">เรื่องเรียน</option>
                        </select>
                    </div>
                    <?php
                    if(isset($_SESSION['username'])){  ?>
                    <div class="col-5 text-right">
                        <a class="btn btn-success rounded-pill" href="newpost.php" role="button">+ สร้างกระทู้ใหม่</a>
                    </div>
                    <?php  }?>
                </div>
                <table class="table table-striped tt ">
                    <tbody>
                        <?php
                        if(isset($_SESSION['role']) && $_SESSION['role']=="a"){      //admin
                            $n=1;
                            while($n<6){ ?>
                        <tr>
                            <th scope="row"><a href="post.php?m=<?=$n?>">กระทู้ที่ <?=$n?></a></th>
                            <td></td>
                            <td></td>
                            <td><a class="btn btn-danger rounded-pill" href="delete.php?p=<?=$n?>" role="button"><i class="fas fa-trash-alt"></i></a></td>
                            <!--                            <i class="fas fa-trash-alt"></i>-->
                        </tr>
                        <?php        $n++;
                                       }
                        } 
                        else{                                                        //others
                            $n=1;
                            while($n<6){ ?>
                        <tr>
                            <th scope="row"><a href="post.php?m=<?=$n?>">กระทู้ที่ <?=$n?></a></th>
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