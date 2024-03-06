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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
<title>library home</title>
<style>
           /*--------css for Search ----------*/
         html, body {
  font-family: 'Montserrat Alternates', sans-serif;
  color: #FFFFFF;
  width: 100%;
  max-width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}
*, *:before, *:after {
  -webkit-tap-highlight-color: transparent;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  user-select: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  padding: 0;
  margin: 0;
}
a, a:visited, a:hover {
  color: inherit;
  text-decoration: none;
}

.search-box {
  position: relative;
  width: 100%;
  max-width: 360px;
  height: 60px;
  border-radius: 120px;
  margin: 0 auto;
  background-image: url(img/op.png);
}
.search-icon, .go-icon {
  position: absolute;
  top: 0;
  height: 60px;
  width: 86px;
  line-height: 61px;
  text-align: center;
}
.search-icon {
  left: 0;
  pointer-events: none;
  font-size: 1.22em;
  will-change: transform;
  transform: rotate(-10deg);
  -webkit-transform: rotate(-10deg);
  -moz-transform: rotate(-10deg);
  -o-transform: rotate(-10deg);
  transform-origin: center center;
  -webkit-transform-origin: center center;
  -moz-transform-origin: center center;
  -o-transform-origin: center center;
  transition: transform 400ms 220ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -webkit-transition: transform 400ms 220ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -moz-transition: transform 400ms 220ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -o-transition: transform 400ms 220ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
}
.si-rotate {
  transform: rotate(0deg);
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
}
.go-icon {
  right: 0;
  pointer-events: none;
  font-size: 1.38em;
  will-change: opacity;
  cursor: default;
  opacity: 0;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transition: opacity 190ms ease-out, transform 260ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -webkit-transition: opacity 190ms ease-out, transform 260ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -moz-transition: opacity 190ms ease-out, transform 260ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -o-transition: opacity 190ms ease-out, transform 260ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
}
.go-in {
  opacity: 1;
  pointer-events: all;
  cursor: pointer;
  transform: rotate(0);
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  -o-transform: rotate(0);
  transition: opacity 190ms ease-out, transform 260ms 20ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -webkit-transition: opacity 190ms ease-out, transform 260ms 20ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -moz-transition: opacity 190ms ease-out, transform 260ms 20ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
  -o-transition: opacity 190ms ease-out, transform 260ms 20ms cubic-bezier(0.190, 1.000, 0.220, 1.000);
}
.search-border {
  display: block;
  width: 100%;
  max-width: 360px;
  height: 60px;
}
.border {
  fill: none;
  stroke: #FFFFFF;
  stroke-width: 10;
  stroke-miterlimit: 10;
}
.border {
  stroke-dasharray: 740;
  stroke-dashoffset: 0;
  transition: stroke-dashoffset 400ms cubic-bezier(0.600, 0.040, 0.735, 0.990);
  -webkit-transition: stroke-dashoffset 400ms cubic-bezier(0.600, 0.040, 0.735, 0.990);
  -moz-transition: stroke-dashoffset 400ms cubic-bezier(0.600, 0.040, 0.735, 0.990);
  -o-transition: stroke-dashoffset 400ms cubic-bezier(0.600, 0.040, 0.735, 0.990);
}
.border-searching .border {
  stroke-dasharray: 740;
  stroke-dashoffset: 459;
  transition: stroke-dashoffset 650ms cubic-bezier(0.755, 0.150, 0.205, 1.000);
  -webkit-transition: stroke-dashoffset 650ms cubic-bezier(0.755, 0.150, 0.205, 1.000);
  -moz-transition: stroke-dashoffset 650ms cubic-bezier(0.755, 0.150, 0.205, 1.000);
  -o-transition: stroke-dashoffset 650ms cubic-bezier(0.755, 0.150, 0.205, 1.000);
}
#search {
  font-family: 'Montserrat Alternates', sans-serif;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 120px;
  border: none;
  background: rgba(255,255,255,0);
  padding: 0 68px 0 68px;
  color: #FFFFFF;
  font-size: 1.32em;
  font-weight: 400;
  letter-spacing: -0.015em;
  outline: none;
}
#search::-webkit-input-placeholder {color: #FFFFFF;}
#search::-moz-placeholder {color: #FFFFFF;}
#search:-ms-input-placeholder {color: #FFFFFF;}
#search:-moz-placeholder {color: #FFFFFF;}
#search::-moz-selection {color: #FFFFFF; background: rgba(0,0,0,0.25);}
#search::selection {color: #FFFFFF; background: rgba(0,0,0,0.25);}
        
        /*----------- css is end here -----------*/
        
</style>
</head>
<body style="background-image: url(img/bkg.jpeg);padding-top: 10px">
<div class="container-fluid">
    
<!-- for log out button -->
<?php include 'logoutbtn.php' ?>
<!-- for upper navigation bar -->
<?php include 'uppernav.php' ?>
    

<div class="row">
<div class="col-md-12">

<!-- php code for check where is the book(i.e. in library or student hand) -->
<?php
if(isset($_POST['show_status'])){
$show_status=mysqli_real_escape_string($conn, trim($_POST["show_status"]));
$sql="select * from issue_books where book_id='$show_status'" ;
$result = mysqli_query($conn,$sql);
$sql="select * from library_book where book_id='$show_status'" ;
$resultb = mysqli_query($conn,$sql);
?>
    
<!-- The Modal is start from here where output will be shown -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 >books Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <!-- Display dynamic records from database -->
        <?php if(mysqli_num_rows($result)>0)
        { 
        $row = mysqli_fetch_object($result); ?>
        <table  class="table table-striped">
        <tr>
        <td><p>The Book which ID is <?php echo $row->book_id; ?>, is taken by <?php echo $row->stu_name  ?> from <?php echo $row->department ?> Department of <?php echo $row->semester ?> Semester (roll no:- <?php echo $row->roll_no ?> ) .</p>  </td>   
        </tr>
        </table>
        <?php }
         else if(mysqli_num_rows($resultb)>0)
        { ?>
        <h5 style="text-align:center;color:darkblue">The Book Is In Library</h5> 
        <?php    }
        else { ?>
            
            <h5 style="text-align:center;color:darkblue">Error: The Book ID Is Wrong !</h5>
            
        <?php }
             ?>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- the model is end here -->    
  <?php }  ?>
</div>
</div>
    
<!-- Code for search -->
<div class="row" style="margin-top:150px">
<div class="col-md-3"></div>
<div class="col-md-6">
      <div class="search-box" >
			<div class="search-icon"><i class="fa fa-search search-icon"></i></div>
			<form method="post" action=" " class="search-form form-inline">
				<input type="text" placeholder="Search" id="search" name="show_status" required autocomplete="off">
			</form>
			<svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;"
			 xml:space="preserve">
          <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280"/>
          <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280"/>
        </svg>
			<div class="go-icon"><i class="fa fa-arrow-right"></i></div>
		</div> <br> 
        <center><h5><b>Check Book Status By It's ID</b></h5></center>
<br><br><br>
    <h1 style="color:white"><center><b>Welcome To Library Of Nalbari Polytechnic</b></center></h1>
</div>
<div class="col-md-3"></div>
</div>


    
</div>   
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>
<script src="js/ownjs.js"></script>
 <?php if(isset($_POST['show_status']))  {?>
    <script>
    $('#myModal').modal();</script>
<?php } ?>    
<script>
$(document).ready(function(){
    $("#search").focus(function() {
      $(".search-box").addClass("border-searching");
      $(".search-icon").addClass("si-rotate");
    });
    $("#search").blur(function() {
      $(".search-box").removeClass("border-searching");
      $(".search-icon").removeClass("si-rotate");
    });
    $("#search").keyup(function() {
        if($(this).val().length > 0) {
          $(".go-icon").addClass("go-in");
        }
        else {
          $(".go-icon").removeClass("go-in");
        }
    });
    $(".go-icon").click(function(){
      $(".search-form").submit();
    });
});
</script>
    
</body>
</html>
