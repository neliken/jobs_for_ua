<?php
session_start();
require 'db_connection.php';
// CHECK USER IF LOGGED IN
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){

// $user_email = $_SESSION['user_email'];
$get_user_data = mysqli_query($db_connection, "SELECT * FROM `users` WHERE user_email = 'neleacechina@gmail.com'");
$userData =  mysqli_fetch_assoc($get_user_data);

}else{
header('Location: logout.php');
exit;
}
// $id =$userData["user_id"];
if(isset($_GET['deleteid'])){

  $id=$_GET['deleteid'];
  $sql1 ="SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0";
  $result1 = mysqli_query($db_connection, $sql1);
  $sql2 = "delete from users where user_id= $id ";

  if(mysqli_query($db_connection, $sql2)){
      header('location: see_users_admin.php');
  }else{
    die(mysqli_error($db_connection));
  }
}?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.png">
    <title>Show Jobs</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

<body>
  <!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>

  <!-- ***** Preloader End ***** -->
<div class="row">
</div>
  <!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="index.php" class="logo">
            <img src="assets/images/logo12.png" alt="">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="home.php" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="show_jobs_admin.php">Show Jobs</a></li>
            <li class="scroll-to-section"><a href="see_users_admin.php">See Users</a></li>
            <li class="scroll-to-section"><div class="border-first-button"><a href="logout.php">Logout</a></div></li>
          </ul>
          <a class='menu-trigger'>
              <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>
  <!-- ***** Header Area End ***** -->
 <br> <br> <br> <br>  <br> <br>
 <div class="">
  <center>
    <table class="table table-bordered">
      <tr>
          <th class="col">Id_user</th>
          <th  class="col">Username</th>
          <th  class="col">User email</th>
          <th  class="col">Delete</th>
      </tr>
      <?php
          $sql="Select * from users";
          $result = mysqli_query($db_connection, $sql);
          if($result){
          while ($row =mysqli_fetch_assoc($result)) {
            $id=$row['user_id'];
            $username=$row['username'];
            $user_email=$row['user_email'];

            echo '

                <tr>
                    <td>'.$id.'</td>
                    <td>'.$username.'</td>
                    <td>'.$user_email.'</td>
                    <td><button><a href="see_users_admin.php?deleteid='.$id.'">Delete</a></button></td>
                </tr>
            ';
    }
  }

   ?>
   </table>
 </center>
</div>

  <!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
