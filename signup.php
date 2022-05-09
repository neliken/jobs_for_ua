<?php
session_start();
require 'db_connection.php';
require 'insert_user.php';
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
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
 </head>
  <body>
    <div class="navbar">
      <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
      <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
      <a href="index.php" style="float:right"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
    <div class="formular">
      <form action="" method="post">
      <h2>Create an account</h2>
      <div>
        <?php
        if(isset($success_message)){
        echo '<div class="success_message">'.$success_message.'</div>';
        }
        if(isset($error_message)){
        echo '<div class="error_message">'.$error_message.'</div>';
        }
        ?>

      <input type="text" name="username" id="username" placeholder="Name Surname" required autocomplete="off">
      <input type="email" name="user_email" id="email" placeholder="Email" required autocomplete="off">
      <input type="password" name="user_password" placeholder="Password" required autocomplete="off">

      <button type="reset" class="button">Reset</button>
      <button type="submit" class="button">Sign Up</button>

      <p>Already have an account? <a href="index.php">Login here</a>.</p>
      </div>
      </form>
    </div>
  </body>
</html>
