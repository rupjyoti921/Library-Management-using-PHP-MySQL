<?php  
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';
?> 


<?php
if(isset($_POST['remove'])){
    $book_id=mysqli_real_escape_string($conn, trim($_POST['book_id']));
    $remove_date=mysqli_real_escape_string($conn, trim($_POST['remove_date']));
  
    $sql="SELECT * FROM book_entry WHERE book_id='$book_id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_object($result);
    
    $sqla="INSERT INTO remove_book (remove_date,book_id,book_name,author_name,price,department,semester,subject) VALUES('$remove_date','$row->book_id','$row->book_name','$row->author_name','$row->price','$row->department','$row->semester','$row->subject')";
    mysqli_query($conn,$sqla);
    
   $sqlb="DELETE FROM book_entry WHERE book_id='$book_id' ";
   mysqli_query($conn,$sqlb);
   $sqlc="DELETE FROM issue_books WHERE book_id='$book_id' ";
   mysqli_query($conn,$sqlc);
   $sqld="DELETE FROM library_book WHERE book_id='$book_id' ";
   mysqli_query($conn,$sqld);
 ?> <script>alert("Delete successful!") </script>  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/subname.js"></script>
    
<title>remove books</title>
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
<br>
    
<h3 style="text-align:center"><u> Remove Books </u></h3><hr>
<div class="row" style=" margin-top:30px; ">
<div class="col-md-1"></div>
<div class="col-md-2" style="border-right:1px solid black">
 
 <form method="post" action="">
 <div class="form-group">
 <label for="Book id" style="text-align: justify"><b>Enter Book Id To Remove Book:</b></label>
 <input type="varchar" class="form-control" name="book_id" placeholder="Enter book id" autocomplete="off" autofocus required>
 </div>
 <div class="form-group">
 <label for="Remove Date" style="text-align: justify"><b>Enter Date: </b> (mm/dd/yyyy)</label>
 <input type="date" class="form-control" name="remove_date" placeholder="Enter Date"  required>
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-danger" name="remove" >Delete</button> 
 </div>
 </form>
    
    
</div>
<div class="col-md-9">
 
<h5 style="text-align:center;color:red;"><u>List of Removed books</u></h5><hr>

   
     <?php 
         $sql="SELECT * FROM remove_book ";     
         $result=mysqli_query($conn,$sql);
         if(mysqli_num_rows($result)>0)
         {  ?>    
    
    <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Book Id</th>
        <th>Book Name</th>
        <th>Author Name</th> 
        <th>Price</th>  
        <th>Depart.</th>
        <th>Sem.</th>
        <th>Subject</th>
        <th>Remove Date</th>
        </thead>
        <?php 
        $x=1; 
            while($row=mysqli_fetch_object($result))
            { 
        ?>
        <tr onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'">
        <td><?php echo $x;  ?></td>
        <td><?php echo $row->book_id; ?></td>
        <td><?php echo $row->book_name; ?></td>
        <td><?php echo $row->author_name; ?></td>
        <td><?php echo $row->price; ?></td>
        <td><?php echo $row->department; ?></td>
        <td><?php echo $row->semester; ?></td>
        <td><?php echo $row->subject; ?></td>
        <td><?php echo $row->remove_date; ?></td>
        </tr>  
        <?php $x++ ;   
            }    ?>
        </table>
        <?php
         } 
        else {  
        ?> <center><h5>No Books Removed Till Now</h5></center> <?php
        }
?> 
</div>                             
</div>

<br><br>
</div>                                
<?php include 'footer.php' ; ?>    
 
    
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
   
</body>
</html>