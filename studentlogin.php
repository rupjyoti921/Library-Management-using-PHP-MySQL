<?php
if(isset($_POST['btn'])){
 //Establishing Connection with server 
 include 'connection.php';

//Define $user id and $phone nmber
$u_id = mysqli_real_escape_string($conn, $_POST['u_id']); 
$p_number = mysqli_real_escape_string($conn, $_POST['p_number']); 
 
$query = mysqli_query($conn, "SELECT  p_number and u_id  FROM stu_details WHERE p_number='$p_number' and u_id='$u_id'  ");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){

session_start();
 if(isset($_REQUEST['u_id']) || isset($_REQUEST['p_number'])){
     $uname=$_REQUEST['u_id'];
     $pass=$_REQUEST['p_number'];
     $_SESSION['u_id'] = $u_id;
     $_SESSION['p_number'] = $p_number;
     echo"<script> location.href='studentpage.php' </script>";
 }
     
  /* header("Location: adminpage.php"); // Redirecting to other page */
 }
 else
 {
 header("Location:studentlogin.php");
 }
mysqli_close($conn); // Closing connection

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Student login</title>
</head>
<body style="padding-top: 100px">
<div class="container">
     <div class="row">
     <div class="col-md-4"></div>
     <div class="col-md-4">
     <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
           <span> <h3 style="color: white"><u>Student Sign In</u></h3> </span><br/>
        </div>
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="u_id" class="form-control" placeholder="User Id">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="varchar" name="p_number" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>
              </form>
          </div>
       </div>
       </div>
       <div class="col-md-4"></div>

</div>
</div>    
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>

</body>
</html>