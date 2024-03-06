<?php
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';

?>

<!-- below code will insert student data into student info table --> 

<?php
    if(isset($_POST['save'])){
     
    $f_name = mysqli_real_escape_string($conn, trim($_POST["f_name"]));
    $l_name = mysqli_real_escape_string($conn, trim($_POST["l_name"]));
    $g_name = mysqli_real_escape_string($conn, trim($_POST["g_name"]));
    $roll_no =mysqli_real_escape_string($conn, trim($_POST["roll_no"])) ;
    $department =mysqli_real_escape_string($conn, trim($_POST["department"])) ;
    $semester = mysqli_real_escape_string($conn, trim($_POST["semester"]));
    $p_number =mysqli_real_escape_string($conn, trim($_POST["p_number"])) ;
    $mail_id = mysqli_real_escape_string($conn, trim($_POST["mail_id"]));
    $u_id =mysqli_real_escape_string($conn, trim($_POST["u_id"])) ;
    
$sql= "INSERT INTO stu_details (f_name,l_name,g_name,roll_no,department,semester,p_number,mail_id,u_id) VALUES('$f_name','$l_name','$g_name','$roll_no','$department','$semester','$p_number','$mail_id','$u_id')";
        
if($result = mysqli_query($conn,$sql)){
?><div style="background-color:lightgreen;color:white;width:fit-content"> <?php echo "Account Successfully Created & "; ?> </div><?php
    
//-- -------------------------Code for Sending Mail----------------------- -->

$to_email = $_POST["mail_id"];
$subject = "Library Account Details";
$body = "Hello ".$_POST["f_name"].", Your Library User Id Is: ".$_POST["u_id"]." "."And Your Password/Phone Number Is: ".$_POST["p_number"]."."."\n\n\n"."Thank You"."\n"."Nalbari Polytechnic,Nalbari.";
$headers = "From: barmanrupjyoti921@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
?><div style="background-color:lightgreen;color:white;width:fit-content"> <?php echo " Email successfully sent to $to_email"; ?> </div><?php
                                                 
} else {
    
    ?><div style="background-color:lightgreen;color:white;width:fit-content"> <?php echo " Email sending failed!!"; ?> </div><?php 
}
//-- -------------------------Code for Sending Mail end here ----------------------- --> 

}
else{ ?> 
   <script>alert("Error Faild To Create account!!"); 
   window.location.href = "update.php";
</script> <?php  }
        
        
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
<title>student account</title>
</head>
    
<body>
<div class="container-fluid">
<div style="background-image: url(img/nbkg.jpg) ;padding-top: 10px">
    
<?php include 'logoutbtn.php' ?>   
<?php include 'uppernav.php' ?> 
<br>
</div> <br>
<h3 style="text-align:center"><u> Maintain Student's Account </u></h3>
<br><hr>

<div class="row" style=" margin-top:30px; ">
<div class="col-md-2"  style="border-right:1px solid black"></div>
<div class="col-md-6" style="border-right:1px solid black">
<h5 style="text-align:center"><u> Create account </u></h5>

<form  style="padding:7px" method="post" action="" autocomplete="off">
       <div class="form-group">
       <label for="First Name"><b>First Name :</b></label>
       <input type="varchar" class="form-control" id="f_name" placeholder="First Name" name="f_name" oninput="this.value = this.value.toUpperCase()" required>
       </div>
       <div class="form-group">
       <label for="Middle and Last Name"><b>Middle and Last Name :</b></label>
       <input type="varchar" class="form-control"  id="l_name" placeholder="Middle and Last Name" name="l_name" oninput="this.value = this.value.toUpperCase()" required>
       </div>
      <div class="form-group">
       <label for="Guardian Name"><b>Guardian Name :</b></label>
       <input type="varchar" class="form-control"  id="g_name" placeholder="Guardian Name" name="g_name" oninput="this.value = this.value.toUpperCase()"  required>
       </div>
       <div class="form-group">
       <label for="roll number"><b>Roll Number</b></label>
       <input type="varchar" class="form-control" oninput="this.value = this.value.toUpperCase()" id="roll_no" name="roll_no" placeholder="NAL/17/CO/001" required> 
       </div>      
       <div class="form-group">
       <label for="department"><b>Department :</b></label>
       <select id="department"  class="form-control" required name="department" >
       <option value="">-- Select a Department --</option>
       <option value="cse">CSE</option>
       <option value="ee">EE</option>
       <option value="pt">PT</option>
       </select>
       </div>
       <div class="form-group">
       <label for="semester"><b>Semester :</b></label>
       <select id="semester" class="form-control"   required name="semester">
       <option value="">-- Select a Semester --</option>
       </select>
       </div>     
       <div class="form-group">
       <label for="Phone Number"><b>Phone Number :</b> <div style="color:red">(Note: It will work as Password)</div></label>
       <input type="varchar" class="form-control"  id="p_number" placeholder="Phone Number without +91" name="p_number" required>
       </div>
       <div class="form-group">
       <label for="E-mail"><b>E-mail :</b></label>
       <input type="email" class="form-control"  id="mail_id" placeholder="E-mail" name="mail_id" required>
       </div>
       <button onclick="copytext()" type="button" class="btn btn-danger">Generate User Id</button>
       <div style="float:right">
       <label for="User id"></label>
       <input type="varchar"  id="u_id" placeholder="User Id" name="u_id" required>
       </div> <br><hr> 
    
     <button style="float:right" type="submit" name="save" class="btn btn-primary">Submit</button>
     
</form>
</div><br>
    
    
<div class="col-md-2" style="border-right:1px solid black">
<h5 style="text-align:center"><u> Edit Account </u></h5><br><br>
<center> <a type="button" class="btn btn-success" href="update.php" >Update Profile Details</a> </center>    
</div>
<div class="col-md-2" > </div><br>

</div>  

<br><br>
<?php include 'footer.php' ; ?>
<script>
function copytext() { 
  /* Get the text field */
  var fname = document.getElementById("f_name").value;
  
  /* generating random number*/
  var min=2000; 
  var max=6000;  
  var random = Math.floor(Math.random() * (+max + 1 - +min)) + +min;
    
  /*concat of above two variable */
  var res = fname.concat(random);
  var new_res = res.split(" ").join("");
  document.getElementById("u_id").value =new_res;   
  
}

</script>
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
</div>
</body>
</html>