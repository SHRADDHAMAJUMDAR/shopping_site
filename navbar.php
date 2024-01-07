<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Page Title</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Your existing HTML content -->

    <!-- Bootstrap JS Bundle (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
session_start();
 $username='';
 $access_lvl=0;
    if(isset($_SESSION['user_name'])){
        $username="Welcome!".$_SESSION['user_name'];
        $access_lvl=$_SESSION['acc_lvl'];
       // header("location: exammaster/facultyhome.php");
      // die(); //get out
    }
    ?>

<main>
  <h1 class="visually-hidden">Headers examples</h1>
  

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
       
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="item_list.php?catid=1" class="nav-link px-2 text-white">Books</a></li>
          <li><a href="item_list.php?catid=2" class="nav-link px-2 text-white">Mobiles</a></li>
          <li><a href="item_list.php?catid=3" class="nav-link px-2 text-white">Clothes</a></li>
          <li><a href="item_list.php?catid=4" class="nav-link px-2 text-white">AC</a></li>
          <li><a href="item_list.php?catid=5" class="nav-link px-2 text-white">TV</a></li>
          <li><a href="item_list.php?catid=6" class="nav-link px-2 text-white">Bag</a></li>
          <li><a href="item_list.php?catid=6" class="nav-link px-2 text-white">About Us</a></li>
          <li><a href="item_list.php?catid=6" class="nav-link px-2 text-white">Contact</a></li>
          <li><a href="item_list.php?catid=6" class="nav-link px-2 text-white">FAQ</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

       

      <div class="text-end">
        <?php
        if( $access_lvl==0)
        {
            ?>
            <a href="login.php" class="btn btn-outline-light me-2">Login</a>
          
            <div class="dropdown">
            <button class="btn btn-outline-light me-2 dropdown-toggle" type="button" id="signupDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Sign-up
            </button>
            <ul class="dropdown-menu" aria-labelledby="signupDropdown">
                <li><a class="dropdown-item" href="register.php">Customer</a></li>
                <li><a class="dropdown-item" href="emp_register.php">Employee</a></li>
            </ul>
        </div>
         <?php   
        }
        else{
            echo $username;
            ?>
            <a href="logout.php" class="btn btn-outline-light me-2">LogOut</a>
<?php 
        }
        ?>
         
        </div>
      </div>
    </div>
  </header>
</main> 

