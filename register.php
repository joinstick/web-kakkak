<?php
    session_start();
if(isset($_SESSION['id'])){
    header('Location:index.php');
}
?>
   <html>
    <head>
        <meta charset="utf-8"/>
        <!--         <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
         <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <title>สมัครสมาชิก</title>
        <style>
            header{
                /*          border: 1px solid black;*/
                text-align: center;
                font-family: 'Montserrat Subrayada', sans-serif;
                /*                font-family: 'Charmonman', cursive;*/
                font-size: 40px;
               padding-top: 10px;
                
            }
            .b{
                background-color: #6CD2FE;  
            }
            .box{
                width: 250px;
                border: 2px solid black;
                padding: 10px;
                margin: 25px;
                margin-left: 40%;
                background-color:#ff9933;
            }
            header .logo{
                max-width: 120px;
                height:auto;
            }
            .inline{
                width: 1000px;
                display: inline-block;

            }
            body{
                /*                background-color:#5c85d6;*/
                background-image: url(../wb_5921600172/img/bg6.jpg);
                background-size: cover;
            }
            .main {
                margin-top: 20px;
            }
            .sub-con{
                margin: auto;

            }
            .sub-con .sub-col {
                margin: auto;
            }
            .cc a{
                font-size: 16px;
            }
             button{
                width: 100px;
                height: auto;
            }
        </style>
    </head>
    <header>
                   
                    <p style="margin:5px;">Registration</p>
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
       </div>
        <div class="main container">
           <?php
             if(isset($_SESSION['error'])){
               if($_SESSION['error']==0){ ?>
                   <div class="alert alert-success" role="alert" style="text-align:center">
                       <?php
                            echo "เพิ่มบัญชีเรียบร้อยแล้ว";
                        ?>
                   </div>
           <?php }else if($_SESSION['error']==1){ ?>
                   <div class="alert alert-danger" role="alert" style="text-align:center">
                       <?php
                            echo "ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา";
                        ?>
                   </div>
          <?php     }
              
                  unset($_SESSION['error']);
                 }
            ?>
            <div class="row">
                <!--                <div class="col-4"></div>-->
                <div class="col-10 col-sm-8 col-md-4 offset-1 offset-sm-2 offset-md-4">     
                   
                    <div class="card" style="height:540px;width:auto;background-color: rgba(0,0,0,0.1);">
                        <div class="card-header">
                            สมัครสมาชิก
                        </div>
                        <div class="card-body">
                            <form method="post" action="register_save.php">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อบัญชี :</label>
                                    <input type="text" class="form-control" name="login" placeholder="Enter Username" style="background-color: rgba(0,0,0,0.07);color:#fff;" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">รหัสผ่าน :</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" style="background-color: rgba(0,0,0,0.07);color:#fff;" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อ-นามสกุล :</label>
                                    <input type="text" class="form-control" name="name"  style="background-color: rgba(0,0,0,0.07);color:#fff;" required>
                                </div>

                                <div class="sub-con container">
                                    <div class="sub-r row text-left">
                                        <div class="sub-col col-6 ">
                                            เพศ :
                                        </div>
                                        <div class="sub-col col-6">
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female" style="background-color: rgba(0,0,0,0.07);color:#fff;" checked>
                                                <label class="form-check-label" for="inlineRadio1">หญิง</label>
                                            </div>
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="male" style="background-color: rgba(0,0,0,0.07);color:#fff;"> 
                                                <label class="form-check-label" for="inlineRadio2">ชาย</label>
                                            </div>
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="other" style="background-color: rgba(0,0,0,0.07);color:#fff;">
                                                <label class="form-check-label" for="inlineRadio2">อื่นๆ</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputEmail4">อีเมลล์</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" style="background-color: rgba(0,0,0,0.07);color:#fff;" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger rounded-pill" name="submit">Submit</button></div>
                            </form>
                        </div>
                    </div>                  
                    <br>
                </div>
            </div>
        </div>
<!--
        <div style="text-align:center">  
            <a href="index.php">กลับไปหน้าหลัก</a>
        </div><br>
-->

    </body>
</html>