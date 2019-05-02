<?php
   session_start();
?> 
   <html>
    <head>
        <meta charset="utf-8"/>
        <title>กระทู้จ้า</title>
        <!--        <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">-->
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
                background-color: rgba(0,0,0,0.07);
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
            
            <div class="one-row row">
                <div class="col-10 col-sm-8 col-md-4 offset-1 offset-sm-2 offset-md-4">
                    <div class="card text-left" style="background-color: rgba(0,0,0,0.1);">
                        <div class="card-header">
                         <?php
                    $n = $_GET['m'];
                    $i = 1;?>
                    <h1 class="text-center" style="font-size:18"><?="ต้องการกระทู้หมายเลข {$n}"?></h1>
                        </div>
                        <div class="card-body">
                           <div class="b form-control-sm" style="margin-bottom:10px;">
                            แสดงความคิดเห็น :
                            </div>
                            <div class="form-group">
                               
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" cols="35" style="background-color: rgba(0,0,0,0.07);color:#fff;" required></textarea>
                            </div>
                            <!--                            <a href="#" class="btn btn-primary">Go somewhere</a>-->
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-danger rounded-pill">ส่งข้อความ</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </body>
</html>