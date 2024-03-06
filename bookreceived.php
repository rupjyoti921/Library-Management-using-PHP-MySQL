<?php  
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';
?>

<!--below php code will delet the book details from the pending/issue table after pressing "RECEIVE".  -->
<?php 
    if(isset($_GET['id'])){
        $delet=mysqli_real_escape_string($conn, trim($_GET['id']));
        $sql="delete from issue_books where book_id= '$delet' ";
        mysqli_query( $conn,$sql); ?>
        
 <!-- After receive, through receive book id we will take the details of that book from "book entry" table and insert the detail in the "library book" table. all of this will be done in the below model box -->
 <!-- The Modal is start from here -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
         
        <?php  
        $sql = "select * from book_entry where book_id='$delet' ";
        $result= mysqli_query($conn,$sql);
        $row=mysqli_fetch_object($result);
        
        $sqld = "INSERT INTO library_book (book_id,book_name,author_name,price,department,semester,subject) VALUES('$row->book_id','$row->book_name','$row->author_name','$row->price','$row->department','$row->semester' ,'$row->subject')";
        mysqli_query($conn,$sqld);
        
        ?>
        <center><h3>Book Is Successfully Return To Library ! </h3></center>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="myFunction()" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- the model is end here --> 


       
   <?php  }
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
    <style>p{color:white; font-size: 20px;}</style>
<title>receive books</title>
</head>
    
<body >
<div class="container-fluid">

<div style="background-image: url(img/nbkg.jpg) ;padding-top: 10px">    
<!-- for log out button -->
<?php include 'logoutbtn.php' ?>
<!-- for upper navigation bar -->
<?php include 'uppernav.php' ?>
<br>
</div><br>
    
<h3 style="text-align:center"><u> Receive Books </u></h3>
<div class="row" style=" margin-top:30px; ">
<div class="col-md-4" style="border-right:0.5px solid black">

<!--below form will  take roll no. for show  pending books details in cards  -->
<form method="post" action="" autocomplete="off">
    <div class="form-group">
    <label><h5><u>Show Pending Books</u></h5><br>(Enter Roll Number)</label><br>
    <input type="varchar" class="form-control" style="text-transform: uppercase" id="roll_show" name="roll_show" placeholder="NAL/17/CO/001" required> <br>
    <button  type="submit" class="btn btn-primary">Show</button>
    </div>
</form>

</div>

<div class="col-md-8">
    
    <!-- below code will fetch the pending books data from database into card-->
    <?php
    if(isset($_POST['roll_show']))
     {
        $roll_show=mysqli_real_escape_string($conn, trim($_POST['roll_show']));
        $sql="select book_id,book_name,price,stu_name,roll_no,department,semester from issue_books where roll_no='$roll_show' ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
         {
            ?> <div class="card-columns"> <?php
            while($row=mysqli_fetch_object($result))
            {
    ?>
    
    <!-- below code will display the pending books data in cards-->
    <div class="card img-fluid"  style="width:400px;border:1px solid black">
    <img class="card-img-top" src="img/bg.jpg"  style="width:100%;height:500px"> 
    <div class="card-img-overlay">
    <table>
        <tr><td><p>Book Id:  <?php echo $row->book_id; ?></p></td></tr>
        <tr><td><p>Book Name:   <?php echo $row->book_name; ?></p></td></tr>
        <tr><td><p>Price:       <?php echo $row->price; ?></p></td></tr>
        <tr><td><p>Student:     <?php echo $row->stu_name; ?></p></td></tr>
        <tr><td><p>Roll No:     <?php echo $row->roll_no; ?></p></td></tr>
        <tr><td><p>Department:     <?php echo $row->department; ?></p></td></tr>
        <tr><td><p>Semester:     <?php echo $row->semester; ?></p></td></tr>
        <tr><td><a href="bookreceived.php?id=<?php echo $row->book_id; ?>" style="color:white; float:right" class="btn btn-success" ><b>RECEIVE</b></a>
        <!--<input type="hidden" id="myModel"> -->
       </td></tr>
    </table>
        
    </div>
    </div> 
    <?php   } ?> </div> <?php
        }
       else{echo"No Record Found";}
    } 
    ?>

</div>    

</div>    
<br><br>
<?php include 'footer.php' ; ?>
</div>   
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>

<script>
function myFunction() {
  location.replace("bookreceived.php")
}    
</script>  
    
<?php if(isset($_GET['id']) ) {?>
    <script>
    $('#myModal').modal();</script>
<?php } ?>
    
<script>
function myFunction() {
  location.replace("bookreceived.php")
}    
</script>  
  
    
</body>
</html>