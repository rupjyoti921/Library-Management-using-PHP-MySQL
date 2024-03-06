<?php
//Establishing Connection with server 
 include 'connection.php';

//Define $user and $pass
$user_name = mysqli_real_escape_string($conn, $_POST['user_name']); 
$pass = mysqli_real_escape_string($conn, $_POST['pass']); 

//sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM admin WHERE user_name='$user_name' and pass='$pass' ");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){

session_start();
 if(isset($_REQUEST['user_name']) || isset($_REQUEST['pass'])){
     $uname=$_REQUEST['user_name'];
     $pass=$_REQUEST['pass'];
     $_SESSION['user_name'] = $uname;
     $_SESSION['pass'] = $pass;
     echo"<script> location.href='adminpage.php' </script>";
 }
     
 
 }
 else
 {
//   echo "<h1>Login Failed!!</h1>" ;
//   header("Location:adminlogin.php");
    ?> 
   <script>alert("Login Failed!! \nTry Again "); 
   window.location.href = "adminlogin.php";
   </script> <?php 
     
 }
mysqli_close($conn); // Closing connection

 
?>