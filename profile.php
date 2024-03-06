<?php  
//code for database connection
include 'connection.php';
//code for session check
include 'uppart.php';
?> 

<!-- below code will take the admin table details to show in the web page -->
<?php
$sql="select*from admin";
$resultadmin=mysqli_query($conn,$sql);
$row=mysqli_fetch_object($resultadmin)
?>

<!-- below code will change the password -->
<?php 
   if(isset($_POST['uppass'])) {     
    $adminpass =mysqli_real_escape_string($conn, trim($_POST["adminpass"])) ;
    $adminconpass =mysqli_real_escape_string($conn, trim($_POST["adminconpass"]));
   if($adminpass==$adminconpass){
       $sql="update admin set pass='$adminconpass' ";
       mysqli_query($conn,$sql); ?>
       <script>
       alert("Password Change Successfully !");
       window.location.href = "profile.php";
       </script> 
    <?php  
   }
    else {
        ?> <script>alert("Error: Password Mismatch Try Again !") ;</script> <?php
    }
                                }
?> 

<!-- below code will create a new account -->
<?php 
   if(isset($_POST['crac'])) {     
    $usname = mysqli_real_escape_string($conn, trim($_POST["usname"]));
    $uspass = mysqli_real_escape_string($conn, trim($_POST["uspass"]));
    $usconpass = mysqli_real_escape_string($conn, trim($_POST["usconpass"]));
   if($usconpass==$uspass){
       $sql="update admin set user_name='$usname',pass='$usconpass' ";
       mysqli_query($conn,$sql); ?>
       <script>
       alert("New Account Updated Successfully !");
       window.location.href = "profile.php";
       </script> 
    <?php  
   }
    else {
        ?> <script>alert("Error: Password Mismatch Try Again !") ;</script> <?php
    }
                                }
?> 


 <!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/subname.js"></script>

<style>
div.scrl {
  background-color: lightblue;
  width: 100%;
  height: 110px;
  overflow: scroll;
}
</style>    
<title>profile</title>
</head>
    
<body >
<div class="container-fluid">
<div style="background-image: url(img/nbkg.jpg) ;padding-top: 10px">
    
<?php include 'logoutbtn.php' ?>   
<?php include 'uppernav.php' ?> 
<br>
</div> <br>
<h3 style="text-align:center"><u> Welcome To <?php echo"".$_SESSION['user_name']; ?>'s Profile </u></h3>
<br><hr>

<div class="row" style=" margin-top:30px; ">
<div class="col-md-4" style="border-right:1px solid black">
<h5 style="text-align:center"><u> Admin Details </u></h5>
<br><br><hr>
<h5>User Name : <?php echo $row->user_name ?> </h5><hr>
<h5>User Password : <?php echo $row->pass ?> </h5><hr>
</div>
 
<!--below code is for changing password -->    
<div class="col-md-4" style="border-right:1px solid black;">
<h5 style="text-align:center"><u> Change Password </u></h5>      
 <form  style="padding:7px" method="post" action="" autocomplete="off">
       <div class="form-group">
       <label for="newpassword" class="mr-sm-4"><b>New Password :  </b></label>
       <input type="password" class="form-control" name="adminpass" required>
       </div>
       <div class="form-group">
       <label for="confirmpassword" class="mr-sm-4"><b>Confirm Password :  </b></label>
       <input type="password" class="form-control" name="adminconpass" required>
       </div>
       <button style="float:right" type="submit" class="btn btn-primary " name="uppass">Update</button>
    </form>        
</div> 

<!-- below code is for creating a new account-->    
<div class="col-md-4" >
<h5 style="text-align:center"><u> Create New Account </u></h5>
<form  style="padding:7px" method="post" action="" autocomplete="off">
       <div class="form-group">
       <label for="username" class="mr-sm-4"><b>New User Name :  </b></label>
       <input type="text" class="form-control" name="usname" required>
       </div>
       <div class="form-group">
       <label for="newpassword" class="mr-sm-4"><b>Password :  </b></label>
       <input type="password" class="form-control" name="uspass" required>
       </div>
       <div class="form-group">
       <label for="confirmpassword" class="mr-sm-4"><b>Confirm Password :  </b></label>
       <input type="password" class="form-control" name="usconpass" required>
       </div>
       <p style="color:red">Note: Creating New Account Will Delete Old One.</p>
       <button style="float:right" type="submit" class="btn btn-primary " name="crac">Create</button>
    </form> 
</div> 
</div><br>    
</div>  

<br><br>
<?php include 'footer.php' ; ?>     
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
</body>
</html>