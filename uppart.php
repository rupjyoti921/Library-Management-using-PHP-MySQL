 <?php
session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['pass'])){
     echo"<script> location.href='adminlogin.php' </script>";
 } 

if(isset($_REQUEST['logout'])){
    unset($_SESSION['user_name']);
    unset($_SESSION['pass']);
    //session_destroy();
    echo "<script> location.href='adminlogin.php' </script> ";
}

?>

 
    
   