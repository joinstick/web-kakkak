<?php
session_start();
include 'connect.php';
 if(isset($_SESSION['success'])){?>
     <script>
     window.alert("การแก้ไขข้อมูลสำเร็จ :)");</script>
 <?php   unset($_SESSION['success']);
 }
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>หน้าแรกของฉัน</title>  
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <style>
            header{
                text-align: center;  
                font-family: 'Montserrat Subrayada', sans-serif;
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
            .nav-item a img{
                margin-bottom: 10px;
            }
        </style>
          <script type="text/javascript">
               function getconfirm(){
                   var reval = confirm("ต้องการจะลบจริงหรือไม่?");
                   if(reval==true){
                       return true;
                   }else{
                       return false;
                   }
               }
              function changeCate(cat){
                window.location.href = "index.php?cat="+cat;
            }
          </script>
                    <?php
              if(isset($_GET['cat']) and ($_GET['cat']>0 and $_GET['cat']<3)){
                  $sql_cate = "select post.id as pid,title,post_date,cat_id,user_id from post join category on post.cat_id=category.id where category.id = {$_GET['cat']} order by post_date desc";
              }else{
                  $sql_cate = "select post.id as pid,title,post_date,cat_id,user_id from post join category on post.cat_id=category.id order by post_date desc";
              }
           $result_cate = mysqli_query($conn,$sql_cate);
          ?>
    </head>
    <header>
                    <p style="margin:5px;">Webboard KakKak</p>
        <hr>
    </header>
    <body>
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
                                <?php
                                                $sql = "select avatar from user where login = '{$_SESSION['username']}'";
                                                $query = mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($query)){
                                                    $avatar = $row['avatar'];
                                                }
                                              ?>
                            <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <a class="navbar-brand" >
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="<?=$avatar?>" style="width:30px;height:30px;border-radius:50%;"><?php echo " {$_SESSION['username']}"; ?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<!--                                              <i class="fas fa-user-astronaut"></i>-->
                                               <a class="dropdown-item" href="profile.php"><i class="fas fa-cogs"></i> การตั้งค่า</a>
                                               <div class="dropdown-divider"></div>
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

                        $query = "select * from category order by id desc";
                        $result = mysqli_query($conn,$query); ?>
                        <select type="option" name="group" class="form-control" style="background-color: rgba(0,0,0,0.07);" onchange="changeCate(this.value);">
                            <option value ="0">--เลือกหมวดหมู่--</option>
                       <?php     while($row = mysqli_fetch_assoc($result)){
                                $id_cate = $row['id'];
                                $name_cate = $row['name'];
                            ?>
                                <option value="<?=$id_cate?>"><?=$name_cate?></option>
                <?php            }
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
                            while($row = mysqli_fetch_assoc($result_cate)){ ?>
                        <tr>
                            <th scope="row">
                                <?php
                                $cate = $row['cat_id'];
                                $title = $row['title'];
                                $user_id = $row['user_id'];
                                $post_date = $row['post_date'];
                                
                                     $post_id = $row['pid'];
                            
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
                            <td><a class="btn btn-danger rounded-pill" href="delete.php?p=<?=$post_id?>" role="button" onclick="return getconfirm();"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php        
                            }
                        } 
                        else{                                                        //others
//                            $sql = "select * from post order by post_date desc ";
//                            $res = mysqli_query($conn,$sql);
                            $n=1;
                            while($row = mysqli_fetch_assoc($result_cate)){ ?>
                        <tr>
                            <th scope="row">
                               <?php
                                $cate = $row['cat_id'];
                                $title = $row['title'];
                                $user_id = $row['user_id'];
                                $post_date = $row['post_date'];
                                
                                     $post_id = $row['pid'];
        
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