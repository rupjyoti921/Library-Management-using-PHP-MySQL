<!-- for session check -->
<?php include 'uppart.php' ;
/* for database connection */
include 'connection.php';  ?>

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

<title>book entry</title>
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

<div class="row" style=" margin-top:30px; ">
<div class="col-md-2"></div>
<div class="col-md-8">
    
 <!-- code for book entry form -->
    
 <div style="border:1px solid black ;">    
 <h3 style="text-align:center"><u> Entry New Book </u></h3>
 <form  style="padding:7px" method="post" action="./bkentodb.php" autocomplete="off">
       <div class="form-group">
       <label for="book id"><b>Book Id :</b></label>
       <input type="varchar" class="form-control" id="book_id" placeholder="Book Id" name="book_id" required>
       </div>
       <div class="form-group">
       <label for="book name"><b>Book Name :</b></label>
       <input type="text" class="form-control"  id="book_name" placeholder="Book Name" name="book_name" oninput="this.value = this.value.toUpperCase()" required>
       </div>
       <div class="form-group">
       <label for="author name"><b>Author Name :</b></label>
       <input type="text" class="form-control"  id="author_name" placeholder="Author Name" name="author_name" oninput="this.value = this.value.toUpperCase()"  required>
       </div>
       <div class="form-group">
       <label for="price"><b>Price</b></label>
       <input type="text" class="form-control" id="price" placeholder="Price" name="price" required>
       </div>
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
       <div class="form-group">
       <label for="entry date"><b>Entry Date :  </b>(mm/dd/yyyy)</label>
       <input type="date" class="form-control" id="entry_date" placeholder="Entry Date" name="entry_date" required>
       </div>
    
     <button  type="submit" class="btn btn-primary">Submit</button>
     
</form>
</div>
</div>
<div class="col-md-2"></div>

</div>    

<br><br>

<?php include 'footer.php' ; ?>
</div>
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
</body>
</html>