<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysqli_select_db($conn,'library_management');

$book_id =mysqli_real_escape_string($conn, trim($_POST["book_id"]));
$book_name=mysqli_real_escape_string($conn, trim($_POST["book_name"]));
$price = mysqli_real_escape_string($conn, trim($_POST["price"]));
$stu_name=mysqli_real_escape_string($conn, trim($_POST["stu_name"]));
$roll_no=mysqli_real_escape_string($conn, trim($_POST["roll_no"]));
$u_id = mysqli_real_escape_string($conn, trim($_POST["u_id"]));
$department = mysqli_real_escape_string($conn, trim($_POST["department"]));
$semester = mysqli_real_escape_string($conn, trim($_POST["semester"]));
$issue_date = mysqli_real_escape_string($conn, trim($_POST["issue_date"]));


$sql="DELETE FROM `library_book` WHERE book_id='$book_id' ";
mysqli_query($conn,$sql); 

$sqlb = "INSERT INTO issue_books (book_id,book_name,price,stu_name,roll_no,u_id,department,semester,issue_date) VALUES('$book_id','$book_name','$price','$stu_name','$roll_no','$u_id','$department','$semester','$issue_date')";

if($resultb=mysqli_query($conn,$sqlb)){  ?>
<script>
  alert("Successful Issued Book !");
  window.location.href = "bookissue.php";
</script> 
<?php }
else{
    ?>
 <script>
  alert("Error: Book Does Not Issue, Try Again !");
  window.location.href = "bookissue.php";
</script> 
<?php
}
?> 









