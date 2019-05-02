<?php
session_start();
include "connect.php";
if(!isset($_GET['check']))         //ถ้าเข้า url มาแบบไม่ได้ login จะให้ไปที่หน้า index
{
    header('Location: index.php');
    die();
}
?>
<html>
    <head>
        <meta charset="utf-8"/>
       
        <title>verify</title>
        
        <header>
            
        </header>
    </head>
    <body>
        <?php
            $id = $_POST['login'];
            $pass = $_POST['pass'];
      $id = mysqli_real_escape_string($conn, $id);
      $pass = mysqli_real_escape_string($conn, $pass);
        $query = "select * from user where login = '{$id}' and password = '{$pass}' ";
        $result = mysqli_query($conn,$query);
        if($id=="admin" && $pass=="ad1234")
        {
            $_SESSION['username'] = $id;
            $_SESSION['role'] = "a";
            $_SESSION["id"] = session_id();

              header('Location: index.php');
        }
//        else if($id=="member" && $pass=="mem1234")
//        {
//            $_SESSION['username'] = $id;
//            $_SESSION['role']="m";
//            $_SESSION["id"] = session_id();
//            header('Location: index.php');
//        }
         else if($result)
        {
              
            while($row = mysqli_fetch_array($result)){
               
                $_SESSION['username'] = $row['login'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['id'] = session_id();
                header('location: index.php');
            }
           $_SESSION['error'] = 1;
            header('Location: login.php');
        }
        else{
            $_SESSION['error'] = 1;
            header('Location: login.php');
        }
 
        ?>
    </body>
</html>