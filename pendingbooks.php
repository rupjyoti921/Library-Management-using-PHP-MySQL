<?php  
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';
?> 

<!--php code for get data from the pending table through filter--> 


<?php 
   if(isset($_POST['check'])) {     
    $dep = mysqli_real_escape_string($conn, trim($_POST["dep"]));
    $sem = mysqli_real_escape_string($conn, trim($_POST["sem"]));
       
    $sql = "SELECT * FROM `issue_books` WHERE `department`='$dep' AND `semester`='$sem' ";
    $result= mysqli_query($conn,$sql); 
     
   }
/* php code for get all the  data from the pendinf table */
  if(isset($_POST['showall'])) {
 
    $sql = "select * from issue_books order by semester asc ";
    $result= mysqli_query($conn,$sql); }
  ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/footer.css">
    
<title>pending books</title>
</head>
    
<body >
<div class="container-fluid">
<div style="background-image: url(img/nbkg.jpg) ;padding-top: 10px">
    
<!-- for log out button -->
<?php include 'logoutbtn.php' ?>
<!-- for upper navigation bar -->
<?php include 'uppernav.php' ?>
<br>
    
</div> <br>
   <h3 style="text-align:center"><u> Issued Book </u></h3>
      <br>
<div class="row" style=" margin-top:30px; ">
<!--below form will take the data to show pending details -->
    <div class="col-md-9">
    
    <form class="form-inline" style="padding:7px" method="post" action="" autocomplete="off">
       <div class="form-group">
       <label for="department" class="mr-sm-4"><b>Department :  </b></label>
       <select id="dep"  class="form-control  mr-sm-4" required name="dep" >
       <option value="">-- Select a Department --</option>
       <option value="cse">CSE</option>
       <option value="ee">EE</option>
       <option value="pt">PT</option>
       </select>
       </div>
       <div class="form-group">
       <label for="semester" class="mr-sm-4"><b>Semester :</b></label>
       <select id="sem"  class="form-control  mr-sm-2" required name="sem" >
       <option value="">-- Select a Semester --</option>
       <option value="1st">1st</option>
       <option value="2nd">2nd</option>
       <option value="3rd">3rd</option>
       <option value="4th">4th</option>
       <option value="5th">5th</option>
       <option value="6th">6th</option>
       </select>
       </div>
       <button  type="submit" class="btn btn-primary mr-sm-5" name="check">Check</button>
    </form>   
     </div>
    <div class="col-md-3" style="border-left:1px solid black">
        
    <!--below form will  show all pending details -->    
    <form method="post" action="">
     <button  type="submit" class="btn btn-success" name="showall">All Issued Books</button>    
    </form>
    </div> 

</div> <hr>
    <!-- below php code is for spce above footer-->
    <?php
    if( !isset($_POST['check']) && !isset($_POST['showall'])  ) { ?>
    <br><br><br><br><br><br><br><br><br>
    <?php }  ?>
    
    <!-- below php and html code will show data in a table form-->
    <?php
    if(isset($_POST['check']) || isset($_POST['showall'])) { ?>
    
    <div class="row" style=" margin-top:30px; ">
    <div class="col-md-12">
     <?php if(mysqli_num_rows($result)>0)
         {  ?>    
    
    <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Book Id</th>
        <th>Book Name</th>
        <th>Price</th>
        <th>Student Name</th>
        <th>Roll No.</th>    
        <th>Department</th>
        <th>Semester</th>
        <th>Issue Date(Y/M/D)</th>
        </thead>
        <?php 
        $x=1; 
            while($row=mysqli_fetch_object($result))
            { 
        ?>
        <tr onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'">
        <td><?php echo $x;  ?></td>
        <td><?php echo $row->book_id ?></td>
        <td><?php echo $row->book_name ?></td>
        <td><?php echo $row->price ?></td>
        <td><?php echo $row->stu_name ?></td>
        <td><?php echo $row->roll_no ?></td>
        <td><?php echo $row->department ?></td>
        <td><?php echo $row->semester ?></td>
        <td><?php echo $row->issue_date ?></td>
        </tr>  
        <?php $x++ ;   
            }    ?>
        </table>
        <?php
         } 
        else {    ?> 
        
        <script>
        alert("Error: No Issued Book Found !");
        window.location.href = "pendingbooks.php";
        </script> 
        
        <?php }
        ?> 
    </div>
    </div>
                                  <?php 
                                        } ?>
<?php include 'footer.php' ; ?>    
</div>   
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
</body>
</html>