<?php
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';
?>

<!-- --------------------Code Delet Student details---------------------------  -->
<?php
if(isset($_POST['del_stu'])){
   $u_id=$_POST['del_stu'];

// code for check pending books before delet students--------------  
 $sqlc="SELECT * FROM `issue_books` WHERE u_id='$u_id' ";
 $resultc=mysqli_query($conn,$sqlc);
 if(mysqli_num_rows($resultc)>0){
  ?> 
   <script>alert("!!Error: This student has taken books from Library(Not Returned),Please before delet Receive the books or Delete if Lost."); 
   window.location.href = "update.php";
   </script> 
  <?php   
     
 }
    else{
   // first delet image --------------------------------------
    $sql="DELETE FROM `img_upload` WHERE u_id='$u_id' ";
   mysqli_query($conn,$sql);
     
   
   $sql="DELETE FROM `stu_details` WHERE u_id='$u_id' ";
   if(mysqli_query($conn,$sql)){ ?> 
   <script>alert("Successfully Delet"); 
   window.location.href = "update.php";
   </script> <?php }    
   else{ ?> 
   <script>alert("Error Delet Faild!!"); 
   window.location.href = "update.php";
   </script> <?php  }
}
    
}

?>


<!-- --------------------Code For Update Student details---------------------------  -->
<?php
if(isset($_POST['update_data'])){
    $f_name =mysqli_real_escape_string($conn, trim($_POST["f_name"])) ;
    $l_name =mysqli_real_escape_string($conn, trim($_POST["l_name"])) ;
    $g_name =mysqli_real_escape_string($conn, trim($_POST["g_name"])) ;
    $roll_no =mysqli_real_escape_string($conn, trim($_POST["roll_no"])) ;
    $department =mysqli_real_escape_string($conn, trim($_POST["department"])) ;
    $semester =mysqli_real_escape_string($conn, trim($_POST["semester"])) ;
    $p_number =mysqli_real_escape_string($conn, trim($_POST["p_number"])) ;
    $mail_id =mysqli_real_escape_string($conn, trim($_POST["mail_id"])) ;
    $u_id =mysqli_real_escape_string($conn, trim($_POST["u_id"])) ;
   

$sqla= "UPDATE `issue_books` SET `stu_name`='".$f_name." ".$l_name."',`roll_no`='".$roll_no."',`department`='".$department."',`semester`='".$semester."' WHERE u_id='$u_id' ";
mysqli_query($conn,$sqla);
    
    
$sqlu= "UPDATE `stu_details` SET `f_name`='".$f_name."',`l_name`='".$l_name."',`g_name`='".$g_name."',`roll_no`='".$roll_no."',`department`='".$department."',`semester`='".$semester."',`p_number`='".$p_number."',`mail_id`='".$mail_id."' WHERE u_id='$u_id' ";
    
    if(mysqli_query($conn,$sqlu)){ ?> 
<script>alert("Update Successful"); 
window.location.href = "update.php";
</script> <?php }    
 else{ ?> 
<script>alert("Error Update Faild!!"); 
 window.location.href = "update.php";
</script> <?php  }   
}
?>



<?php
 $sql1="select * from stu_details where semester= '1st' order by department asc ";
      $result1= mysqli_query($conn,$sql1);
   
$sql2="select * from stu_details where semester= '2nd' order by department asc";
      $result2= mysqli_query($conn,$sql2);

$sql3="select * from stu_details where semester= '3rd' order by department asc";
      $result3= mysqli_query($conn,$sql3);

$sql4="select * from stu_details where semester= '4th' order by department asc";
      $result4= mysqli_query($conn,$sql4);

$sql5="select * from stu_details where semester= '5th' order by department asc";
      $result5= mysqli_query($conn,$sql5);

$sql6="select * from stu_details where semester= '6th' order by department asc";
      $result6= mysqli_query($conn,$sql6);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/subname.js"></script>
 
<title>update profile</title>
<style>
  table, th, td {
  border: 1px solid black;
  text-align: center;
}
th, td {
  padding: 5px;
}
</style>
</head>
    
<body>
<div class="container-fluid">
<div style="background-image: url(img/nbkg.jpg) ;padding-top: 10px">
    
<?php include 'logoutbtn.php' ?>   
<?php include 'uppernav.php' ?> 
<br>
</div> <br>
<h3 style="text-align:center"><u> Update Student's Details </u></h3>
<br><hr>

<div class="row" style=" margin-top:30px; ">
<div class="col-md-8" style="border-right:1px solid black">


<!-- ---------------------------showing students details in table---------------- -->
<center><h4><u>1st Semester</u></h4></center>
 <?php    if(mysqli_num_rows($result1)>0)
         {   ?>
            <table style="width:100%">
             <thead style="width:100%">
               <th>Name</th>
               <th>User Id</th>
               <th>Roll No.</th>
               <th>Ph No.</th>
               <th>Depart.</th>
               <th>Semester</th>
               <th>Update</th>
               <th>Delet</th>
            </thead>
      <?php while($row1=mysqli_fetch_object($result1))
            {  ?> 
            <tr>
              <td><?php echo $row1->f_name." ".$row1->l_name ;?></td>
              <td><?php echo $row1->u_id ;?></td>
              <td><?php echo $row1->roll_no ;?></td>
              <td><?php echo $row1->p_number ;?></td>  
              <td><?php echo $row1->department ;?></td>
              <td><?php echo $row1->semester ;?></td>
              <td><a  href="update.php?id=<?php echo $row1->u_id; ?>" style="color:white" type="button" class="btn btn-primary" >Update</a></td>
              <td>
              <form method="post" action="">
              <input type="hidden" name="del_stu" id="del_stu" value="<?php echo $row1->u_id; ?>"><button style="color:white;" type="submit" class="btn btn-danger" >Delete</button>
              </form>
              </td>
            </tr>
         <?php } ?>
     </table> <hr>  
<?php  }
    ?>
<!-- -------------------------------------------------------------------------- -->    
<hr><center><h4><u>2nd Semester</u></h4></center>
  <?php    if(mysqli_num_rows($result2)>0)
         {   ?>
            <table style="width:100%">
             <thead style="width:100%">
               <th>Name</th>
               <th>UserId</th>
               <th>Roll No.</th>
               <th>Ph No.</th>
               <th>Depart.</th>
               <th>Semester</th>
               <th>Update</th>
               <th>Delet</th>
            </thead>
      <?php while($row2=mysqli_fetch_object($result2))
            {  ?> 
            <tr>
              <td><?php echo $row2->f_name." ".$row2->l_name ;?></td>
              <td><?php echo $row2->u_id ;?></td>
              <td><?php echo $row2->roll_no ;?></td>
              <td><?php echo $row2->p_number ;?></td>  
              <td><?php echo $row2->department ;?></td>
              <td><?php echo $row2->semester ;?></td>
              <td><a  href="update.php?id=<?php echo $row2->u_id; ?>" style="color:white" type="button" class="btn btn-primary" >Update</a></td>
              <td>
              <form method="post" action="">
              <input type="hidden" name="del_stu" id="del_stu" value="<?php echo $row2->u_id; ?>"><button style="color:white;" type="submit" class="btn btn-danger" >Delete</button>
              </form>
              </td>
            </tr>
         <?php } ?>
     </table> <hr>  
<?php  }
    ?>
<!-- -------------------------------------------------------------------------- -->    
<hr><center><h4><u>3rd Semester</u></h4></center>
   <?php    if(mysqli_num_rows($result3)>0)
         {   ?>
            <table style="width:100%">
             <thead style="width:100%">
               <th>Name</th>
               <th>UserId/th>
               <th>Roll No.</th>
               <th>Ph No.</th>
               <th>Depart.</th>
               <th>Semester</th>
               <th>Update</th>
               <th>Delet</th>
            </thead>
      <?php while($row3=mysqli_fetch_object($result3))
            {  ?> 
            <tr>
              <td><?php echo $row3->f_name." ".$row3->l_name ;?></td>
              <td><?php echo $row3->u_id ;?></td>
              <td><?php echo $row3->roll_no ;?></td>
              <td><?php echo $row3->p_number ;?></td>  
              <td><?php echo $row3->department ;?></td>
              <td><?php echo $row3->semester ;?></td>
              <td><a  href="update.php?id=<?php echo $row3->u_id; ?>" style="color:white" type="button" class="btn btn-primary" >Update</a></td>
              <td>
              <form method="post" action="">
              <input type="hidden" name="del_stu" id="del_stu" value="<?php echo $row3->u_id; ?>"><button style="color:white;" type="submit" class="btn btn-danger" >Delete</button>
              </form>
              </td>
            </tr>
         <?php } ?>
     </table> <hr>  
<?php  }
    ?>
<!-- -------------------------------------------------------------------------- -->    
<hr><center><h4><u>4th Semester</u></h4></center>
    <?php    if(mysqli_num_rows($result4)>0)
         {   ?>
            <table style="width:100%">
             <thead style="width:100%">
               <th>Name</th>
               <th>User Id</th>
               <th>Roll No.</th>
               <th>Ph No.</th>
               <th>Depart.</th>
               <th>Semester</th>
               <th>Update</th>
               <th>Delet</th>
            </thead>
      <?php while($row4=mysqli_fetch_object($result4))
            {  ?> 
            <tr>
              <td><?php echo $row4->f_name." ".$row4->l_name ;?></td>
              <td><?php echo $row4->u_id ;?></td>
              <td><?php echo $row4->roll_no ;?></td>
              <td><?php echo $row4->p_number ;?></td>  
              <td><?php echo $row4->department ;?></td>
              <td><?php echo $row4->semester ;?></td>
              <td><a  href="update.php?id=<?php echo $row4->u_id; ?>" style="color:white" type="button" class="btn btn-primary" >Update</a></td>
              <td>
              <form method="post" action="">
              <input type="hidden" name="del_stu" id="del_stu" value="<?php echo $row4->u_id; ?>"><button style="color:white;" type="submit" class="btn btn-danger" >Delete</button>
              </form>
              </td>
            </tr>
         <?php } ?>
     </table> <hr>  
<?php  }
    ?>
<!-- -------------------------------------------------------------------------- -->    
<hr><center><h4><u>5th Semester</u></h4></center>
    <?php    if(mysqli_num_rows($result5)>0)
         {   ?>
            <table style="width:100%">
             <thead style="width:100%">
               <th>Name</th>
               <th>User Id</th>
               <th>Roll No.</th>
               <th>Ph No.</th>
               <th>Depart.</th>
               <th>Semester</th>
               <th>Update</th>
               <th>Delet</th>
            </thead>
      <?php while($row5=mysqli_fetch_object($result5))
            {  ?> 
            <tr>
              <td><?php echo $row5->f_name." ".$row5->l_name ;?></td>
              <td><?php echo $row5->u_id ;?></td>
              <td><?php echo $row5->roll_no ;?></td>
              <td><?php echo $row5->p_number ;?></td>  
              <td><?php echo $row5->department ;?></td>
              <td><?php echo $row5->semester ;?></td>
              <td><a  href="update.php?id=<?php echo $row5->u_id; ?>" style="color:white" type="button" class="btn btn-primary" >Update</a></td>
              <td>
              <form method="post" action="">
              <input type="hidden" name="del_stu" id="del_stu" value="<?php echo $row5->u_id; ?>"><button style="color:white;" type="submit" class="btn btn-danger" >Delete</button>
              </form>
              </td>
            </tr>
         <?php } ?>
     </table> <hr>  
<?php  }
    ?>
<!-- -------------------------------------------------------------------------- -->    
<hr><center><h4><u>6th Semester</u></h4></center>
    <?php    if(mysqli_num_rows($result6)>0)
         {
            ?>
     <table style="width:100%">
             <thead style="width:100%">
               <th>Name</th>
               <th>User Id</th>
               <th>Roll No.</th>
               <th>Ph No.</th>
               <th>Depart.</th>
               <th>Semester</th>
               <th>Update</th>
               <th>Delet</th>
            </thead>
      <?php while($row6=mysqli_fetch_object($result6))
            {  ?> 
            <tr>
              <td><?php echo $row6->f_name." ".$row6->l_name ;?></td>
              <td><?php echo $row6->u_id ;?></td>
              <td><?php echo $row6->roll_no ;?></td>
              <td><?php echo $row6->p_number ;?></td>  
              <td><?php echo $row6->department ;?></td>
              <td><?php echo $row6->semester ;?></td>
              <td><a  href="update.php?id=<?php echo $row6->u_id; ?>" style="color:white" type="button" class="btn btn-primary" >Update</a></td>
              <td>
              <form method="post" action="">
              <input type="hidden" name="del_stu" id="del_stu" value="<?php echo $row6->u_id; ?>">
              <button style="color:white;" type="submit" class="btn btn-danger" >Delete</button>
              </form>
              </td>
            </tr>
         <?php } ?>
     </table> <hr>
<?php  
}
    ?>
</div>
<!-- ------------------------------------------------------------ -->
<div class="col-md-4" >
<?php if(isset($_GET['id']) ) {

?>
<!-- ----------------------- Form for update data -------------- -->

<form  style="padding:7px;border:1px solid black;margin-bottom:8px" method="post" action="" autocomplete="off">
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
       <label for="Roll No."><b>Roll Number</b></label>
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
       <option value="1st">1st</option>
       <option value="2nd">2nd</option>
       <option value="3rd">3rd</option>
       <option value="4th">4th</option>
       <option value="5th">5th</option>
       <option value="6th">6th</option>
       </select>
       </div>     
       <div class="form-group">
       <label for="Ph No."><b>Phone Number :</b> </label>
       <input type="varchar" class="form-control"  id="p_number" placeholder="Phone No. without +91" name="p_number" required>
       </div>
       <div class="form-group">
       <label for="E-mail"><b>E-mail :</b></label>
       <input type="email" class="form-control"  id="mail_id" placeholder="E-mail" name="mail_id" required>
       </div>
       <div class="form-group">
       <label for="User id"></label>
       <input type="hidden" class="form-control" id="u_id" placeholder="User Id" name="u_id" required>
       </div>
       <div class="form-group">
       <button   type="submit" name="update_data" class="btn btn-success">UPDATE</button>
    </div>
     
</form> 

    
<?php } ?>
    
</div>
<!-- ------------------------------------------------------------- -->
</div>  
</div>

<?php include 'footer.php' ; ?>
 
<?php if(isset($_GET['id']) ) {
  $u_id= mysqli_real_escape_string($conn, trim($_GET['id']));
  $sqld="select * from stu_details where u_id='$u_id' ";
  $resultd=mysqli_query($conn,$sqld);
  $rowd=mysqli_fetch_object($resultd);
  ?>
  <script>
document.getElementById("f_name").value =" <?php echo $rowd->f_name; ?>"; 
document.getElementById("l_name").value =" <?php echo $rowd->l_name; ?>";
document.getElementById("g_name").value =" <?php echo $rowd->g_name; ?>"; 
document.getElementById("roll_no").value =" <?php echo $rowd->roll_no; ?>"; 
document.getElementById("p_number").value =" <?php echo $rowd->p_number; ?>";
document.getElementById("mail_id").value =" <?php echo $rowd->mail_id; ?>";
document.getElementById("u_id").value =" <?php echo $rowd->u_id; ?>";


  </script>  
<?php } ?>
    
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>

</body>
</html>