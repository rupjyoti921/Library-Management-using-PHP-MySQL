<?php
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';

$book_id = mysqli_real_escape_string($conn, trim($_POST["book_id"]));
$book_name=mysqli_real_escape_string($conn, trim($_POST["book_name"]));
$author_name=mysqli_real_escape_string($conn, trim($_POST["author_name"]));
$price =mysqli_real_escape_string($conn, trim($_POST["price"])); 
$department=mysqli_real_escape_string($conn, trim($_POST["department"]));
$semester=mysqli_real_escape_string($conn, trim($_POST["semester"]));
$subject=mysqli_real_escape_string($conn, trim($_POST["subject"]));
$entry_date = mysqli_real_escape_string($conn, trim($_POST["entry_date"]));

$sql = "INSERT INTO book_entry (book_id,book_name,author_name,price,department,semester,subject,entry_date) VALUES('$book_id','$book_name','$author_name','$price','$department','$semester','$subject','$entry_date')";
$result=mysqli_query($conn,$sql);

$sql = "INSERT INTO library_book (book_id,book_name,author_name,price,department,semester,subject) VALUES('$book_id','$book_name','$author_name','$price','$department','$semester','$subject')";
mysqli_query($conn,$sql);

?>
<?php if($result>0) {  ?>
<script>
  alert("Data Entry Successful !");
  window.location.href = "bookentry.php";
</script> 
<?php }
else{
    ?>
 <script>
  alert("Error: This Book Id's Entry Is Already Done, Try Again !");
  window.location.href = "bookentry.php";
</script> 
<?php
}
?>    



