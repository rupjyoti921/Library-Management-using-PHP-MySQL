<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysqli_select_db($conn,'library_management');

 $filename = $_FILES["pimg"]["name"]; 
    $tempname = $_FILES["pimg"]["tmp_name"]; 
      $u_id=$_POST["u_id"];
        $folder = "stu_img/".$filename;
  
        // Get all the submitted data from the form 
        $sql = "INSERT INTO img_upload (img,u_id) VALUES ('$filename','$u_id')"; 
  
        // Execute query 
        mysqli_query($conn, $sql); 
          
        // Now let's move the uploaded image into the folder: stu_img 
        if (move_uploaded_file($tempname, $folder))  {  ?>
            <script>
            alert("Successfully Upload");
            </script>  <?php
        }else{ 
            ?>
            <script>
            alert("Faild To Upload !!");
            </script>  <?php
      } 

?> 









