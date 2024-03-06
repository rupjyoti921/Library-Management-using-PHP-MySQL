<div class="row"> <div class="col-md-12">
<nav class="navbar navbar-expand-lg  navbar-dark">
  <a class="navbar-brand" style="color:white;font-size:20px;font-weight: bold;border-left:0.5px solid white"><?php echo " Welcome  ".$_SESSION['user_name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">   
    <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" style="border-left:0.5px solid white">
        <a class="nav-link" href="adminpage.php" style="color:white;font-size:20px;font-weight: bold;" >Home</a>
      </li>
      <li class="nav-item dropdown" style="border-left:0.5px solid white">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:white;font-size:20px;font-weight: bold;">
        Books
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="bookentry.php">Books Entry</a>
        <a class="dropdown-item" href="pendingbooks.php">Issued Books</a>
         <a class="dropdown-item" href="allentry.php">All Entry Books</a>
          <a class="dropdown-item" href="remove.php">Remove Books</a>
      </div>
      </li>
      <li class="nav-item" style="border-left:0.5px solid white">
        <a class="nav-link" href="bookissue.php" style="color:white;font-size:20px;font-weight: bold;">Issue Books </a>
      </li>
      <li class="nav-item" style="border-left:0.5px solid white">
        <a class="nav-link" href="bookreceived.php" style="color:white;font-size:20px;font-weight: bold;">Receive Books</a>
      </li>
      <li class="nav-item" style="border-left:0.5px solid white">
        <a class="nav-link" href="student.php" style="color:white;font-size:20px;font-weight: bold;">Student</a>
      </li>
      <li class="nav-item" style="border-left:0.5px solid white">
       <a class="nav-link" href="librarybooks.php" style="color:white;font-size:20px;font-weight: bold;">Books In Library&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</a>
      </li>
      <li class="nav-item" style="border-left:0.5px solid white">
        <a class="nav-link" href="profile.php" style="color:white;font-size:20px;font-weight: bold;">Profile</a>
      </li>
    </ul>
  </div>
</nav>    
</div></div> 

  
