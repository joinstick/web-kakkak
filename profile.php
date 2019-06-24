<?php
session_start();
include 'connect.php';
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <!--        <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!--        <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <title>หน้าLogin</title>
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
                background-color: #6CD2FE;  
            }
            .box{
                width: 250px;
                border: 2px solid black;
                padding: 10px;

                margin-left: 40%;
                background-color:#d9b3ff;
            }
            body{
                background-image: url(../wb_5921600172/img/bg6.jpg);
                background-size: cover;
            }
            .cc a {
                font-size: 16px;
            }
            .main {
                margin-top: 20px;
            }
            .aa a{
                color:aliceblue;
            }
            .tt{
                background-color: #ff6699;
            }
            button{
                width: 120px;
                height: auto;
            }
            nav{
                background-color: rgba(0,0,0,0,0.07);
            }
            footer{
                font-family: 'Waiting for the Sunrise';
                background-color: rgba(0,0,0,0.15);
                color: #fff;
                margin-top: 40px;
                margin-left: 0px;
                padding-top: 20px;
                padding-bottom: 5px;
                font-size: 15px;
                text-align: center;
            }
              .nav-item a img{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <header>
        <p style="margin:5px;">Webboard KakKak</p>

        <hr>
    </header>
    <?php
    
    $sql = "select * from user where login = '{$_SESSION['username']}' ";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        $login = $row['login'];
        $name = $row['name'];
        $password = $row['password'];
        $gender = $row['gender'];
        $email = $row['email'];
        $avatar = $row['avatar'];
//        echo $login;
    }
//    echo $avatar;
//    print_r($_FILES);
//         die();
     if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $profile_img = time().'_'.$_FILES['profileImage']['name'];
    $target = 'img/'.$profile_img;
//         print_r($_FILES);
//         die();
    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
    
    $sql_update = "update user set ";
    $sql_update .= "login = '$login',";
    $sql_update .= "password = '$password',";
    $sql_update .= "name = '$name',";
    $sql_update .= "gender = '$gender',";
    $sql_update .= "email = '$email',";
    $sql_update .= "avatar = '$target' "; 
    $sql_update .= "where login = '{$_SESSION['username']}' ";
    $result = mysqli_query($conn,$sql_update);
    if($result){ 
      header('location:index.php');
        $_SESSION['success'] = 1; ?>
    <?php   }else{ ?>
      <script>
     window.alert("การแก้ไขข้อมูลผิดพลาด :(");</script>
    <?php  
        echo "ผิดแล้วนะ1";
                 }
     }
         
    else{
    $sql_update = "update user set ";
    $sql_update .= "login = '$login',";
    $sql_update .= "password = '$password',";
    $sql_update .= "name = '$name',";
    $sql_update .= "gender = '$gender',";
    $sql_update .= "email = '$email' ";
    $sql_update .= "where login = '{$_SESSION['username']}' ";
    $result = mysqli_query($conn,$sql_update);
    if($result){ 
      header('location:index.php');
        $_SESSION['success'] = 1;
        ?>
    <?php   }else{ ?>
      <script>
     window.alert("การแก้ไขข้อมูลผิดพลาด :(");</script>
    <?php   
       echo "ผิดแล้วนะ2";
    }
     }
     }
    ?>
    <body>
        <!--    <img src="../wb_5921600172/img/1557326637_60865.jpg" alt="" style="width:200px">-->
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

        </div>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group text-center">
                            <img src="<?=$avatar?>" onclick="triggerClick();" id="profileDisplay" style="width:200px;height:200px;border-radius:50%;cursor:pointer;margin-bottom:10px;" >
                            <br><label for="profileImage"><i class="fas fa-camera-retro"></i>  Edit Profile Image</label>
                            <input type="file" name="profileImage" onchange="displayImage(this);" id="profileImage" accept="image/*" style="display:none" value="<?=$avatar?>">
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:20px;">
                        <div class="container">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="login">ชื่อบัญชี :</label>
                                    <input type="text" class="form-control" name="login" placeholder="Enter Username" style="background-color: rgba(0,0,0,0.07);color:#fff;" value="<?=$login?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">รหัสผ่าน :</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" style="background-color: rgba(0,0,0,0.07);color:#fff;" value="<?=$password?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">ชื่อ-นามสกุล :</label>
                                    <input type="text" class="form-control" name="name"  style="background-color: rgba(0,0,0,0.07);color:#fff;" value="<?=$name?>" required>
                                </div>

                                <div class="sub-con container">
                                    <div class="sub-r row text-left">
                                        <div class="sub-col col-6 ">
                                            เพศ :
                                        </div>
                                        <div class="sub-col col-6">
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="f" style="background-color: rgba(0,0,0,0.07);color:#fff;" checked>
                                                <label class="form-check-label" for="gender">หญิง</label>
                                            </div>
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="m" style="background-color: rgba(0,0,0,0.07);color:#fff;"> 
                                                <label class="form-check-label" for="gender">ชาย</label>
                                            </div>
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="o" style="background-color: rgba(0,0,0,0.07);color:#fff;">
                                                <label class="form-check-label" for="gender">อื่นๆ</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="email">อีเมลล์</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" style="background-color: rgba(0,0,0,0.07);color:#fff;" value="<?=$email?>" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger rounded-pill" name="submit">แก้ไขข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        function triggerClick() {
                            document.querySelector('#profileImage').click();
                        }

                        function displayImage(e) {
                            if(e.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
                                }
                                reader.readAsDataURL(e.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>
        </form>
    </body>
</html>