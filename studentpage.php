 <?php
//db connection
include'connection.php';
// to check session before login
    session_start();
    if(!isset($_SESSION['u_id']) || !isset($_SESSION['p_number'])){
    echo"<script> location.href='studentlogin.php' </script>";
 } 

?>

<?php
// for logout button to destroy session
if(isset($_REQUEST['logoutstudent2'])){
    //session_unset();
    unset($_SESSION['u_id']);
    unset($_SESSION['p_number']);
   // session_destroy();
    echo "<script> location.href='studentlogin.php' </script> ";
}
?>


<!-- Get data from the database for student account-------- -->
<?php
   if(isset($_SESSION['u_id'])) {  
    $u_id=mysqli_real_escape_string($conn, trim($_SESSION['u_id']));
    $sql = "select * from stu_details where u_id='$u_id'  ";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_object($result);
    
  
   }
?>




<!-- ------------------------sending image to database---------------------------- -->
<?php
  if(isset($_POST['upload'])){
      
 $image = $_FILES["image"]["name"]; 
    $tempname = $_FILES["image"]["tmp_name"]; 
      $u_id=$_POST["u_id"];
        $folder = "stu_img/".basename($image);
  
        // Get all the submitted data from the form 
        $sql = "INSERT INTO img_upload (image,u_id) VALUES ('$image','$u_id')"; 
  
        // Execute query 
        mysqli_query($conn, $sql); 
          
        // Now let's move the uploaded image into the folder: stu_img 
        if (move_uploaded_file($tempname, $folder))  { 
        ?> <script>alert("Successfully Upload") </script>  <?php
           
        }else{ 
            
            ?> <script>alert("Faild To Upload !!") </script> <?php
         
      }
      
  }
?> 

<!-- ------------------------sending image to database code end ---------------------------- -->



<!-- Get data from the database for filter books-------- -->
<?php 
   if(isset($_POST['showlb'])) {     
    $dep = mysqli_real_escape_string($conn, trim($_POST["department"]));
    $sem = mysqli_real_escape_string($conn, trim($_POST["semester"]));
    $sub = mysqli_real_escape_string($conn, trim($_POST["subject"]));
    $sqlf = "select * from library_book where department='$dep' and semester='$sem' and subject='$sub' ";
    $resultf= mysqli_query($conn,$sqlf); }

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
    <link rel="stylesheet" href="css/studentpage.css">
    
<title>student page</title>
<style>
    p{color:white;
      font-size: 22px}
</style>
</head>
    
<!--  body start -->   
<body>
<div class="container-fluid">


<div id="mySidenav" class="sidenav">

<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    
    
 <?php  
    
    $sqlimg="select image from `img_upload` where u_id='$row->u_id' ";
    $resultimg= mysqli_query($conn,$sqlimg);
       if(mysqli_num_rows($resultimg)>0) { 
   
     $rowimg=mysqli_fetch_object($resultimg) ;
  ?>
 <a> <img src="stu_img/<?php echo $rowimg->image; ?>"  height="250px" width="100%" style="border-radius: 50%">  </a>
                                    <?php } 
    else { 
    ?>

<!-- Code For Upload profile image ------- -->  
    <center>
    <h6 style="color:white">Upload Profile Image</h6>
    <form method="post" action="" enctype="multipart/form-data"> 
        <input style="color:white;border:1px solid white;margin-bottom:6px" type="file" name="image" id="image" value="" required /> 
        <input type="hidden" id="u_id" name="u_id" value="<?php echo $_SESSION['u_id'];  ?>" >
        <div> 
        <button  type="submit" class="btn btn-success" name="upload"> UPLOAD </button> 
        </div> 
    </form>
    </center>

    <?php  } ?>

  
<!-- code for profile details  -->
 
  <a><?php echo "Name : ".$row->f_name."  ".$row->l_name; ?></a>
  <a>User ID : <?php echo $_SESSION['u_id']; ?> </a>
  <a><?php echo "Phone Number : ".$row->p_number; ?></a>
  <a><?php echo "Roll No : ".$row->roll_no; ?></a>
  <a><?php echo "Guardian Name : ".$row->g_name; ?></a>
  <a><?php echo "Department : ".$row->department; ?></a>
  <a><?php echo "Semester : ".$row->semester; ?></a>
  <a><?php echo "E-mail : ".$row->mail_id; ?></a>

</div>

<!-- Log out button -->
        
       <div style="float:right; margin-top:30px;" > <form action="" method="post" style="padding-bottom:10px"> <input type="submit" class="btn btn-danger" style="color:white" value="Logout" name="logoutstudent2" class="nav-link" >
       </form></div>

       
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Profile</span>
</div>

<hr style="border-top:1px solid darkblue">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10" style="border-left:1px solid black">
<h4><center><u>My books</u></center></h4><br>
    
    
<!-- below code will fetch the pending books data from database into card-->
    <?php
    
    if(isset($_SESSION['u_id']))
     {
    $u_id=mysqli_real_escape_string($conn, trim($_SESSION['u_id']));
    $sqlc = "select * from `issue_books` where u_id='$u_id' ";
    $resultc= mysqli_query($conn,$sqlc);
    
        if(mysqli_num_rows($resultc)>0)
         {  
            ?> <div class="card-columns" style="color:white;font-size:20px"> <?php
            while($rowc=mysqli_fetch_object($resultc))
            {
    ?>
    
    <!-- below code will display the pending books data in cards-->
    <div class="card img-fluid"  style="width:400px;border:1px solid black">
    <img class="card-img-top" src="img/bg.jpg"  style="width:100%;height:400px"> 
    <div class="card-img-overlay">
    <table>
        <tr><td><p>Book Id:  <?php echo $rowc->book_id; ?></p></td></tr>
        <tr><td><p>Book Name:   <?php echo $rowc->book_name; ?></p></td></tr>
        <tr><td><p>Price:       <?php echo $rowc->price; ?></p></td></tr>
        <tr><td><p>Roll No:     <?php echo $rowc->roll_no; ?></p></td></tr>
        <tr><td><p>Department:     <?php echo $rowc->department; ?></p></td></tr>
        <tr><td><p>Semester:     <?php echo $rowc->semester; ?></p></td></tr>
    </table>
        
    </div>
    </div> 
    <?php   } ?> </div> <?php
        }
       else{ ?> <center><h3 style="color:red"><u>I have not taken any book. </u></h3></center><br><br>  <?php   }
    } 
    ?>
    
    

<hr style="border-top:2px solid darkblue">
<h4><center><u>Search for Books</u></center></h4>
    
    
    <!--below form will take the data to show library books through filter -->
    <form   style="padding:7px" method="post" action="" autocomplete="off"> 
       <div class="form-group">
       <label for="department"><b>Department :</b></label>
       <select id="department"  class="form-control" required name="department" >
       <option value="">-- Select a Department --</option>
       <option value="cse">CSE</option>
       <option value="ee">EE</option>
       <option value="pt">PT</option>
       <option value="sc">SCIENCE</option>
       <option value="hu">HUMANITIES</option>
       <option value="wo">WORKSHOP</option>
       <option value="others">Others</option>
       </select>
       </div>
       <div class="form-group">
       <label for="semester"><b>Semester :</b></label>
       <select id="semester" class="form-control"   required name="semester">
       <option value="">-- Select a Semester --</option>
       </select>
       </div>
        <div class="form-group">
       <label for="subject"><b>Subject :</b></label>
       <select id="subject"  class="form-control" required name="subject" >
       <option value="">-- Select a Subject --</option>
       </select>
       </div>
       <button  type="submit" name="showlb" class="btn btn-primary">Show</button>
    </form><hr>   
  
    
    
    
    
    
    
    
    

<!-- below code will show the data in tabular form -->
     <?php
     if(isset($_POST['showlb'])) { 
     if(mysqli_num_rows($resultf)>0)
         {   ?>    
    <div class="scrl">
  
      <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Book Name</th>     
        <th>Author Name</th> 
        </thead>
        <?php 
        $x=1; 
            while($rowf=mysqli_fetch_object($resultf))
            { 
        ?>
        <tr onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'">
        <td><?php echo $x;  ?></td>
        <td><?php echo $rowf->book_name ?></td>
        <td><?php echo $rowf->author_name ?></td>
        </tr>  
        <?php $x++ ;   
            }    ?>
      </table>
    </div>
        <?php
         } 
        else { ?>
        <script>
        alert("Error: No Book Found, Try Again !");
        window.location.href = "studentpage.php";
        </script>    
        <?php   }
        ?> 
        </div>
        <?php 
        }  ?>     
    
    

</div>
 

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "100px";
  document.body.style.backgroundColor = "";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
 </div>  
</body>
</html> 
