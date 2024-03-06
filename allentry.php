<?php  
//code for session check
include 'uppart.php';
//code for database connection
include 'connection.php';
?> 
  
<?php 
  /* below php code will get the data from entry table*/
  if(isset($_POST['showallentry'])) {
    $sql = "select * from book_entry order by entry_date asc ";
    $result= mysqli_query($conn,$sql); }
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
    
<title>entry books</title>
</head>
 
<style>
div.scrl {
  background-color: white;
  width: 100%;
  height: 600px;
  overflow: scroll;
}
</style>    

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
<h3 style="text-align:center"><u> Check All Entry Books </u></h3>
<div class="row" style=" margin-top:30px; ">
    <div class="col-md-3" >
    <!--below form will show all entry books -->    
    <form method="post" action="">
    <button  type="submit" class="btn btn-success" name="showallentry"> Show All Entry Books</button> </form>
    </div> 
    <div class="col-md-9"></div>
</div> <hr>
    
    <!-- below code will run when we press showallentry and it will give the result in tabuler form -->
    <?php
    if(isset($_POST['showallentry'])) { ?>
    
<div class="row" style=" margin-top:30px; ">
     <div class="col-md-9">
     <?php if(mysqli_num_rows($result)>0)
         {  ?>    
        <div class="scrl">
        <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Book Id</th>
        <th>Book Name</th>
        <th>Price</th>
        <th>Author Name Name</th>
        <th>Entry Date(Y/M/D)</th>
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
        <td><?php echo $row->author_name ?></td>
        <td><?php echo $row->entry_date ?></td>
        </tr>  
        <?php $x++ ;   
            }    ?>
        </table>
         </div>
        <?php
         } 
        else { echo "No record found!";}
        ?> 
       
        
    </div> 
    <?php 
                                        } ?>
    
    <!-- below form is to see a book details       -->
    <div class="col-md-3" style="border-left:1px solid black">
      <form method="post" action="" autocomplete="off">
      <div class="form-group">
      <label><h5><u>Search Book details</u></h5>(Enter Book Id)</label>
      <input type="varchar" class="form-control"  name="idcheck" placeholder="Book Id" required > <br>
      <button  type="submit" class="btn btn-primary" name="search">Search</button>
      </div>
      </form>  
    </div>

<!-- below php code will check the book details from entry book table and put into below model box-->
<?php 
  if(isset($_POST['idcheck'])) {
  $idcheck=mysqli_real_escape_string($conn, trim($_POST['idcheck']));
  $sql = "select * from book_entry where book_id='$idcheck'";
  $bkinfo= mysqli_query($conn,$sql); 
?>
    
<!-- The Modal is start from here -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 >Book Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <!-- Display dynamic records from database -->
        <?php if(mysqli_num_rows($bkinfo)>0)
        { ?>
        <table class="table table-striped">
         <thead style="background-color:skyblue;font-size:18px;color:white">
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Price</th>
            <th>Entry Date</th>
         </thead>
           <?php while ($rowss = mysqli_fetch_object($bkinfo)){ ?>
            <tr>
                <td><?php echo $rowss->book_id; ?></td>
                <td><?php echo $rowss->book_name; ?></td>
                <td><?php echo $rowss->author_name; ?></td>
                <td><?php echo $rowss->price; ?></td>
                <td><?php echo $rowss->entry_date; ?></td>
            </tr>                                     <?php } ?>
        </table>
        <?php unset($roll_check); }
         else{ ?>
        <script>
        alert("Error: No Entry Book Found !");
        window.location.href = "allentry.php";
        </script>    
                                      
        <?php unset($roll_check); }
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
<?php                                  }  ?>
        
  
</div>
<br><br>
                                 
<?php include 'footer.php' ; ?>    
</div>   
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
<?php if(isset($_POST['idcheck']))  {?>
    <script>
    $('#myModal').modal();</script>
<?php } ?>
</body>
</html>