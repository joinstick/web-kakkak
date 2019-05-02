<?php
   $conn = mysqli_connect('localhost','root','','webboard');
   if(!$conn){
       echo "ไม่สามารถเชื่อมต่อกับ mysql ได้ ".mysqli_errno()."".mysqli_error();
   }
//   else{
//       echo "เชื่อมต่อกับ mysql สำเร็จ";
//   }
    mysqli_set_charset($conn,'utf8');
?>
<?php
//session_start();
////$con = mysqli_connect('localhost','root','');
//$con = mysqli_connect('localhost','root','')or die('unable to connect'); 
//mysqli_set_charset($con,"utf8");
//mysqli_select_db($con, 'regisdb');
//$user = $_POST['user'];
//$password = $_POST['pass'];
//$name = $_POST['name'];
//$gender = $_POST['gender'];
//$email = $_POST['email'];
//$s = "select * from registable where username = '$user' ";
//$result = mysqli_query($con, $s);
//$num = mysqli_num_rows($result);
//if($num==1){
//    echo "Username Already Taken"; 
//     
//}
//else{
//    $reg = "insert into registable(username , password , name , gender , email) values ('$user' , '$password' , '$name' , '$gender' , '$email')";
//   
//    mysqli_query($con,$reg);
//    echo "Registration Successful";
// header('location:login.php'); 

//}
?>