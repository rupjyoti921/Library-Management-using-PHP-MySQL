

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Admin Login</title>
</head>
<body style="padding-top: 100px;background-image: url('img/adminbkg.jpg'); background-size: 100%">
<div class="container">
     <div class="row">
     <div class="col-md-4"></div>
     <div class="col-md-4"> <br><br><br><br>
     <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <h3 style="color: white"><u>Admin Sign In</u></h3> </span>
        </div>
        <div class="card-body">
            <form action="./logcheck.php" method="post" autocomplete="off">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="user_name" class="form-control" placeholder="Username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="pass" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                 <input style="color:white; font-size:15px; font-weight: bold" type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>
              </form>
          </div>
       </div>
       </div>
       <div class="col-md-4"></div>

</div>
</div>    
<script src="js/jquery.js"></script>    
<script src="js/bootstrap.min.js"></script>

    
</body>
</html>