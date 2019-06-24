<?php 
session_start();
if(!isset($_POST['submit'])){
    header('location:index.php');
}
include 'connect.php';
?>

<?php 

if(isset($_POST['submit'])){
    //    echo "<pre>",print_r($_FILES),"</pre>";
    //    echo "<pre>",print_r($_FILES['avatar']),"</pre>";
    //    echo "<pre>",print_r($_FILES['avatar']['name']),"</pre>";
    //    print_r($_FILES);
//    die();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = mysqli_real_escape_string($conn,$login);
    $password = mysqli_real_escape_string($conn,$password);

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $_SESSION['role']="m";
    $role = $_SESSION['role'];
    $profile_img = time().'_'.$_FILES['avatar']['name'];
    $target = 'img/'.$profile_img;
    $repeat_user = "select * from user where login = '{$login}'";
    $res_user = mysqli_query($conn,$repeat_user);
    $num = mysqli_num_rows($res_user);
    
    if(move_uploaded_file($_FILES['avatar']['tmp_name'],$target)){
        echo "upload image success!";
        if($num==1){
            $_SESSION['error'] = 1;
            header('location:register.php');
        }else{
            $sql = "insert into user(login,password,name,gender,email,role,avatar) ";
            $sql .= "values ('$login','$password','$name','$gender','$email','$role','$target')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $_SESSION['error'] = 0;
                $_SESSION['avatar'] = $target ;
                       header('location:register.php');
               // header('location:profile.php');
            }else{
                $_SESSION['error'] = 1;
                header('location:register.php');
            }
        }
    }else{
      if($num==1){
            $_SESSION['error'] = 1;
            header('location:register.php');
        }else{
            $target = 'img/profile.png';
            $sql = "insert into user(login,password,name,gender,email,role,avatar) ";
            $sql .= "values ('$login','$password','$name','$gender','$email','$role','$target')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $_SESSION['error'] = 0;
//                $_SESSION['avatar'] = $target ;
                        header('location:register.php');
            }else{
                $_SESSION['error'] = 1;
                header('location:register.php');
            }

        }
            echo "cannot to upload image"; 
    }
}
?>