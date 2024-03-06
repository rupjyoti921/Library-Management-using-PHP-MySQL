<?php  
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';

?> 
 
<!--below code will get data about book from "library book" table according to department,semester and subject -->
<?php 
   if(isset($_POST['showlb'])) {     
    $dep = mysqli_real_escape_string($conn, trim($_POST["department"]));
    $sem = mysqli_real_escape_string($conn, trim($_POST["semester"]));
    $sub = mysqli_real_escape_string($conn, trim($_POST["subject"]));
    $sql = "select * from library_book where department='$dep' and semester='$sem' and subject='$sub' ";
    $result= mysqli_query($conn,$sql); }

  ?>

<!-- below code will get the data of whole books available in the library book table --> 
<?php 
   if(isset($_POST['showalllb'])) {     
    $sql = "SELECT * FROM `library_book`";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/subname.js"></script>

<style>
div.scrl {
  background-color: white;
  width: 100%;
  height: 600px;
  overflow: scroll;
}
</style>    
<title>library books</title>
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
<h3 style="text-align:center"><u> Books In Library </u></h3>
<br>

<!-- below form will show the all books available in the library -->
<div class="row" style=" margin-top:30px; ">
    <div class="col-md-12">
    <form method="post" action="">
    <center>    
    <button  type="submit" class="btn btn-success" name="showalllb">All Library Books</button>    
    </center>
    </form>
    </div> 
</div><hr><br>    
  
<div class="row" style=" margin-top:30px; ">
    
<!--below form will take the data to show library books through filter -->
    <div class="col-md-5" style="border-right:1px solid black">
    <form  style="padding:7px" method="post" action="" autocomplete="off"> 
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
    </div>
     
    <!-- below code will show the data in tabular form -->
     <?php
     if(isset($_POST['showlb']) || isset($_POST['showalllb'])) { ?>
     <div class="col-md-7">
      <?php if(mysqli_num_rows($result)>0)
         {   ?>    
    <div class="scrl">
    <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Book Id</th>
        <th>Book Name</th>     
        <th>Author Name</th> 
        <th>Price</th>
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
        <td><?php echo $row->author_name ?></td>
        <td><?php echo $row->price ?></td>
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
        window.location.href = "librarybooks.php";
        </script>    
            
            
       <?php   }
        ?> 
       
        
    </div>
    </div>
                                  <?php 
                                        }  ?>   
    </div>
    <br><br>
    
<?php include 'footer.php' ; ?>     
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
</body>
</html>