<?php
if(isset($_SESSION['username']))
{$loggedin=true;}else{$loggedin=false;}
echo
'<nav class="navbar navbar-expand-lg navbar-light bg-light" id="headers">
  <div class="container-fluid">
    <a class="navbar-brand text-danger" href="#">INTOURIST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">HOME</a>
        </li>';
        if(!$loggedin){
         echo
        '<li class="nav-item">
          <a class="nav-link" href="login.php">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">SIGN-UP</a>
        </li>';
        }
        if($loggedin==true){ echo
        '<li class="nav-item">
          <a class="nav-link" href="logout.php">LOGOUT</a>
        </li>';}
      ?>
      <?php
         echo
      '</ul>
      <div class="nav-link mx-2">';
      ?>
      
      <?php
      if($loggedin==true){ echo
        
        'Welcome '.$_SESSION['username'];
      }
       ?>
      <?php
      echo
      '</div>
      <form class="d-flex" method="get" role="search" action="searchpage.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
        <button class="btn btn-outline-success" type="submit" >Search</button>
      </form>
    </div>
  </div>
</nav>';
?>