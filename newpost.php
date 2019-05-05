<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>newpost</title>

        <!--        <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">-->
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
                text-align: center;
                background-image: url(../wb_5921600172/img/bg6.jpg);
                background-size: cover;
            }
            .box{
                width: 300px;
                height: auto;
                background-color:#d9b3ff;
                padding: 10px;
            }
            /*
            .inline{
            width: 1000px;
            display: inline-block;

            }
            header .logo{
            max-width: 120px;
            height:auto;
            }
            */
            .cc a {
                font-size: 16px;
            }
            .one-row{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .navi{
                margin-top: -15px;
            }
        </style>
    </head>
    <header> 
        <div class="h container">
            <div class="h row">
                <div class="col-12"> 
                    <h2 style="margin:5px;">Webboard KakKak</h2></div>
            </div>
        </div>
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
                                        <li class="navi nav-item dropdown">
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
                    <div class="col-10 col-sm-8 col-md-6 offset-1 offset-sm-2 offset-md-3">
                        <div class="card text-left" style="background-color: rgba(0,0,0,0.1);">
                            <div class="card-header">
                                <?php
                                if(isset($_SESSION['id'])){ 
                                    if(isset($_SESSION['username'])){?>
                                <!--                                echo "ผู้ใช้ : {$_SESSION['username']}<br>";-->
                                ผู้ใช้ : <?=$_SESSION['username']?><br> 
                                <?php   }

                                ?>
                            </div>
                            <div class="card-body">
                               <form action="newpost_save.php" method="post">
                               <div class="row">
                                <div class="col-6 col-sm-6 col-md-5">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">หมวดหมู่ : </label>
                                    <select class="form-control" name="cate" style="background-color: rgba(0,0,0,0.1);">
<!--                                        <option value="all">--ทั้งหมด--</option>-->
                                        <option value="1" selected>เรื่องทั่วไป</option>
                                        <option value="2">เรื่องเรียน</option>
                                    </select>
                                  </div>  
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">หัวข้อ : </label>
                                    <input type="text" class="form-control" style="background-color: rgba(0,0,0,0.1);color:#fff;" id="formGroupExampleInput" placeholder="" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">เนื้อหา : </label>
                                    <textarea class="form-control" style="background-color: rgba(0,0,0,0.1);color:#fff;" id="exampleFormControlTextarea1" rows="8" name="content" required></textarea>
                                </div>
                                <!--                            <a href="#" class="btn btn-primary">Go somewhere</a>-->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger rounded-pill" name="submit">บันทึกข้อความ</button></div>
                              </form>      
                            </div>

                            <?php
                                } 

                                else{
                                    echo "<div style =\"text-align:center\">คุณยังไม่ได้เข้าสู่ระบบ</div>";
                            ?>
                            <div style="text-align:center">
                                <a href="index.php">กลับสู่หน้าหลัก</a></div>
                            <?php   
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </body>
</html>