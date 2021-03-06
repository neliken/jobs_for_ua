<?php
session_start();
require 'db_connection.php';
require 'login-back.php';
// IF USER LOGGED IN
if(isset($_SESSION['user_email'])){
header('Location: home.php');
exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="index.php">About</a></li>
            <li class="scroll-to-section"><a href="show_jobs.php">Jobs</a></li>
            <li class="scroll-to-section"><a href="info.php">Contact</a></li>
            <li class="scroll-to-section"><div class="border-first-button"><a href="signup.php">Register</a></div></li>
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
<br>
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="assets/images/contact-dec-v3.png" alt="">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="fill-form">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4>Login</h4>
                      <fieldset>
                        <input type="email" name="user_email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required>
                      </fieldset>
                      <fieldset>
                        <input type="password" name="user_password" id="password" placeholder="Password" autocomplete="off">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <!-- <fieldset>
                        <button type="reset" id="form-submit" class="main-button ">Reset</button>
                      </fieldset> -->
                      <fieldset> <br>
                        <?php
                        if(isset($success_message)){
                        echo '<div class="alert alert-succes">'.$success_message.'</div>';
                        }
                        if(isset($error_message)){
                        echo '<div class="alert alert-danger">'.$error_message.'</div>';
                        }
                        ?>
                      <a href="home.php"><button type="submit" id="form-submit" class="main-button">Login</button></a>
                      </fieldset>
                      <br>
                      <p>Don't have an account? <a href="signup.php">Sign up now</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 align-self-center">
                <div >
                  <img src="assets/images/services-image.jpg" alt="">
                </div>
              </div>
            </div>
          </form>
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
