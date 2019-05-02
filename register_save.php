<?php 
session_start();
include 'connect.php';?>
<?php 
if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = mysqli_real_escape_string($conn,$login);
    $password = mysqli_real_escape_string($conn,$password);

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $_SESSION['role']="m";
    $role = $_SESSION['role'];
    $sql = "insert into user(login,password,name,gender,email,role) ";
    $sql .= "values ('$login','$password','$name','$gender','$email','$role')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['error'] = 0;
        header('location:register.php');
    }else{
        $_SESSION['error'] = 1;
        header('location:register.php');
    }
}
?>