<?php
session_start();
require 'db_connection.php';
require 'login.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  <body>
    <div class="navbar">
      <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
      <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
      <a href="signup.php" style="float:right"><i class="fa fa-fw fa-user"></i>Register</a>
    </div>
      <center>
        <div class="formular">
          <form action="" method="post">
          <h1>Login</h1>
          <?php
          if(isset($success_message)){
          echo '<div class="success_message">'.$success_message.'</div>';
          }
          if(isset($error_message)){
          echo '<div class="error_message">'.$error_message.'</div>';
          }
          ?>
          <input type="email" name="user_email" id="email" placeholder="Email" required autocomplete="off">
          <input type="password" name="user_password" id="password" placeholder="Password" required autocomplete="off">

          <div class="container" style="background-color:#f1f1f1">
          <a href="home.php"><button type="submit" class="button">Login</button></a>
          </div>
          <p>Don't have an account? <a href="signup.php">Sign up now</a></p>
          </form>
      </div>
    </center>
  </body>
</html>
