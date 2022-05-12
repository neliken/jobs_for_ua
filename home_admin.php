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
?>
<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="icon" href="assets/images/logo.png">

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
<link rel="stylesheet" href="assets/css/animated.css">
<link rel="stylesheet" href="assets/css/owl.css">

</head>
<body> <!-- ***** Preloader Start ***** -->
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

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
<div class="container">
<div class="row">
  <div class="col-12">
    <nav class="main-nav">
      <!-- ***** Logo Start ***** -->
      <a href="home.php" class="logo">
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
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <div class="row">
                <div class="col-lg-12">
                  <h6>Hello, <?php echo $userData['username'];?></h6>
                  <h2>We Boost Your Number of Employers</h2>
                  <!-- <p>This template is brought to you by TemplateMo website. Feel free to use this for a commercial purpose. You are not allowed to redistribute the template ZIP file on any other template website. Thank you.</p> -->
                </div>
                <div class="col-lg-12">
                  <div class="border-first-button scroll-to-section">
                    <a href="show_jobs_admin.php">See your jobs</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="assets/images/slider-dec-v3.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
