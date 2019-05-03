<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:index.php');
}
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
                width: 100px;
                height: auto;
            }
            nav{
                background-color: rgba(0,0,0,0,0.07);
            }
        </style>
    </head>
    <header>
        <p style="margin:5px;">Webboard KakKak</p>
                 
        <hr>
    </header>

    <body>
        <form method="post" action="verify.php?check=1">
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

                <div class="main container">
                    <div class="c-row row">
                        <!--                    <div class=" col-md-4 col-sm-4"></div>-->
                        <div class="col-10 col-md-4 col-sm-8 offset-1 offset-md-4 offset-sm-2">

                            <?php
                            if(isset($_SESSION['error']))
                            {       
                            ?>
                            <div class="alert alert-danger" role="alert" style="text-align:center">
                                ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง

                                <!--                        ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง<?=$_SESSION['error']?>  -->

                                <!--
<?php
                                echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง{$_SESSION['error']}" ; ?>
-->
                            </div>
                            <?php
                                unset($_SESSION['error']);
                            }             
                            ?>    

                            <div class="card" style="background-color: rgba(0,0,0,0.1);">
                                <div class="card-header">
                                    เข้าสู่ระบบ
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Login :</label>
                                            <input type="text" class="form-control" style="background-color: rgba(0,0,0,0.07);color:#fff;" name="login" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password :</label>
                                            <input type="password" class="form-control" style="background-color: rgba(0,0,0,0.07);color:#fff;" name="pass" placeholder="Enter Password" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-danger rounded-pill">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>                  
                            <br>
                            <div class="aa text-center">
                                ถ้ายังไม่ได้เป็นสมาชิก&nbsp;&nbsp;<a href="register.php">กรุณาสมัครสมาชิก</a></div>
                            <br>   
                        </div>
                        <!--                    <div class="col-md-4 col-sm-4"></div>-->
                    </div><br>
                </div>
            </div>
        </form>
    </body>
</html>