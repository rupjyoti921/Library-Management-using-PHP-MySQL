<?php
 // code for check session
 include 'uppart.php' ; 
// database connection
 include 'connection.php';
?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script src="js/subname.js"></script>
<title>issue books</title>
</head>

<body >
<div class="container-fluid">
<div style="background-image: url(img/nbkg.jpg) ;padding-top: 10px">
    
<!-- for log out button -->
<?php include 'logoutbtn.php' ?>
<!-- for upper navigation bar -->
<?php include 'uppernav.php' ?>
<br>
</div>
    
    
<!--below code is for show the details of pendings books of a student in below model box -->
<?php 
    if(isset($_POST['roll_check'])) {

    $roll_check = mysqli_real_escape_string($conn, trim($_POST["roll_check"]));
    $sql = "SELECT `book_id`, `book_name`, `price`, `stu_name`, `roll_no`, `u_id`, `department`, `semester`, `issue_date` FROM `issue_books` WHERE  roll_no= '$roll_check'";
    $result= mysqli_query($conn,$sql);      
    ?>
    
         
  <!-- The Modal is start from here -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 >Student and books details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <!-- Display dynamic records from database -->
        <?php if(mysqli_num_rows($result)>0)
        { ?>
        <table class="table table-striped">
         <thead  style="background-color:skyblue;font-size:18px;color:white">
            <th>Sl No.</th>
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Student Name</th>
            <th>Roll Number</th>
         </thead>
           <?php $x=1; while ($row = mysqli_fetch_object($result)){  ?>
            <tr>
                <td><?php echo $x; ?></td>
                <td><?php echo $row->book_id; ?></td>
                <td><?php echo $row->book_name; ?></td>
                <td><?php echo $row->stu_name; ?></td>
                <td><?php echo $row->roll_no; ?></td>
            </tr>                                     <?php $x++; } ?>
        </table>
        <?php unset($roll_check); }
         else{ ?> <h5 style="text-align:center;color:red">Result Not Found !</h5>                           <?php unset($roll_check); }
             mysqli_close($conn); ?>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- the model is end here -->
    
  <?php  unset($roll_check) ;   } ?>
    
<!-- ------------------------------------------------------------------------------------- -->
<div class="row" style=" margin-top:30px; ">
<div class="col-md-8">
<!-- ----------------------Code for check book id and roll no. --------------------- -->
<div style="border:1px solid black ;">    
<h3 style="text-align:center"><u> Issue Books </u></h3>

<!--   below FORM  is for verify a book by a book Id -->    
        <form method="post" action="" style="padding-right:10px" autocomplete="off">
        <div class="form-group">&emsp;&emsp;
        <input type="varchar" class="form-control mr-sm-4" id="checkbkid" placeholder="Check Book Id" name="checkbkid" required>
        </div>
    
<!--   below FORM  is for verify a book by a book Id -->    
        <div class="form-group">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="varchar" class="form-control mr-sm-4" id="checkrollno" placeholder="Check Roll Number" name="checkrollno" required>
        <button style="float:right;margin-top:5px" type="submit" class="btn btn-primary"><span style='font-size:20px;'>&#10004;</span></button>
        </div>
        </form>  
    
<!-- below php code will verify a book by its id and fetch the info of a book -->
<?php
    if(isset($_POST['checkbkid']) || isset($_POST['checkrollno'])){
        $checkbkid=mysqli_real_escape_string($conn, trim($_POST["checkbkid"]));
        
        $sql="select book_id,book_name,author_name,price from library_book where book_id='$checkbkid' ";
        $bkinfo=mysqli_query($conn,$sql);
        $rows1 = mysqli_fetch_object($bkinfo);        
       
//------------ below php code will verify roll number and fetch the info of a book 
        $checkrollno=mysqli_real_escape_string($conn, trim($_POST["checkrollno"]));
        $sql="select f_name,l_name,roll_no,u_id,department,semester from stu_details where roll_no='$checkrollno' ";
        $rollinfo=mysqli_query($conn,$sql);
        $rows2 = mysqli_fetch_object($rollinfo);
          }
?>
    
<!-- The Modal for show book details is start from here -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
        <!-- Display dynamic records from database -->
        <?php   if(!$rows1){ 
         ?><h4 style="color:red"><center><u>"Error: This Book's Id Is Not Found In The Library, Try Again !</u></center></h4>  <?php
        }    else{  ?>
        <table class="table table-striped">
        <h4><center><u>Book Details</u></center></h4>
         <thead  style="background-color:skyblue;font-size:18px;color:white">
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Price</th>
         </thead>
            <tr>
                <td><?php echo $rows1->book_id; ?></td>
                <td><?php echo $rows1->book_name; ?></td>
                <td><?php echo $rows1->author_name; ?></td>
                <td><?php echo $rows1->price; ?></td>
            </tr>                                    
        </table> <?php }  
        if(!$rows2){
        ?><h4 style="color:red"><center><u>"Error: This Student's Roll No Is Not Found , Try Again !</u></center></h4>  <?php  
        }    else{  ?>
        <table class="table table-striped">
         <h4><center><u>Student Details</u></center></h4>
         <thead  style="background-color:skyblue;font-size:18px;color:white">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Roll Number</th>
             <th>Student Id</th>
            <th>Department</th>
            <th>Semester</th>
         </thead>
            <tr>
                <td><?php echo $rows2->f_name; ?></td>
                <td><?php echo $rows2->l_name; ?></td>
                <td><?php echo $rows2->roll_no; ?></td>
                <td><?php echo $rows2->u_id; ?></td>
                <td><?php echo $rows2->department; ?></td>
                <td><?php echo $rows2->semester; ?></td>
            </tr>                                   
        </table>  <?php  } ?>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onclick="copytext1()" class="btn btn-danger" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- the model is end here -->
    
    

<!--below form is for submiting details when we issue a book --> 
<form  style="padding:7px" method="post" action="./pebktodb.php" autocomplete="off">
       <h4><u>Book And Student Details</u></h4><br>
       <div class="form-group">
       <label for="book id"><b>Book Id :</b></label>
       <input type="varchar" class="form-control" id="book_id" placeholder="Book Id" name="book_id" required>
       </div>
       <div class="form-group">
       <label for="book name"><b>Book Name :</b></label>
       <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name"  required >
       </div>
       <div class="form-group">
       <label for="price"><b>Price</b></label>
       <input type="text"  class="form-control"  id="price" placeholder="Price"  name="price"   required>
       </div>
       <div class="form-group">
       <label for="student name"><b>Student Name :</b></label>
       <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" id="stu_name" name="stu_name" placeholder="Student Name" required> 
       </div>
       <div class="form-group">
       <label for="roll number"><b>Roll Number :</b></label>
       <input type="varchar" class="form-control" oninput="this.value = this.value.toUpperCase()" id="roll_no" name="roll_no" placeholder="NAL/17/CO/001" required>
       </div>
       <div class="form-group">
       <label for="Student idr"><b>Student ID :</b></label>
       <input type="varchar" class="form-control" oninput="this.value = this.value.toUpperCase()" id="u_id" name="u_id" placeholder="Student Id/User Id" required>
       </div>
       <div class="form-group">
       <label for="department"><b>Department :</b></label>
       <input  type="varchar" class="form-control" oninput="this.value=this.value.toUpperCase()" id="department" name="department" placeholder="Department" required>
       </div>
       <div class="form-group">
       <label for="semester"><b>Semester :</b></label>
       <input  type="varchar" class="form-control" oninput="this.value=this.value.toUpperCase()" id="semester" name="semester" placeholder="Semester" required>
       </div>
       <div class="form-group">
       <label for="issue date"><b>Issue Date :  </b>(mm/dd/yyyy)</label>
       <input type="date" class="form-control" id="issue_date" placeholder="Entry Date" name="issue_date" required>
       </div>
       <button  type="submit" class="btn btn-primary">Issue</button>
</form>
</div>
</div>


<!--below code is for searching the pending books  by student's roll number -->
<div class="col-md-4" style="border-left:0.5px solid black">
<form method="post" action=" " autocomplete="off">
    
    <div class="form-group">
    <label><h5><u>Search for Pending Books</u></h5><br>(Enter Roll Number)</label><br>
    <input type="varchar" class="form-control" style="text-transform: uppercase"  name="roll_check" id="roll_check" placeholder="NAL/17/CO/001" required > <br>
    <button  type="submit" class="btn btn-primary" >Search</button>
    </div>

</form>
</div>

</div>

<br><br>
<?php include 'footer.php' ; ?>
</div>   
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
<!-- calling model box for pending book check --> 
<?php if(isset($_POST['roll_check']))  {?>
    <script>$('#myModal').modal();</script>
<?php } ?>

<!-- calling model box for showing book details --> 
<?php if(isset($_POST['checkbkid']))  {?>
    <script>$('#myModal1').modal();</script>
<?php } ?>
        
<!-- calling model box for showing stu details --> 
<?php if(isset($_POST['checkrollno']))  {?>
    <script>$('#myModal2').modal();</script>
<?php } ?>
<!-- --------------------------------------------------------------- -->
    
<script>
function copytext1() {
  document.getElementById("book_id").value =" <?php echo $rows1->book_id; ?>"; 
   document.getElementById("book_name").value =" <?php echo $rows1->book_name; ?>"; 
     document.getElementById("price").value =" <?php echo $rows1->price; ?>"; 

  document.getElementById("roll_no").value =" <?php echo $rows2->roll_no; ?>";
  document.getElementById("u_id").value =" <?php echo $rows2->u_id; ?>";
   document.getElementById("stu_name").value =" <?php echo $rows2->f_name." ".$rows2->l_name ?>";
    document.getElementById("department").value =" <?php echo $rows2->department; ?>";
     document.getElementById("semester").value =" <?php echo $rows2->semester; ?>";
}
</script>

</body>
</html>