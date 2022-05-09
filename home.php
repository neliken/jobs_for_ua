<?php
session_start();
require 'db_connection.php';
// CHECK USER IF LOGGED IN
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){

$user_email = $_SESSION['user_email'];
$get_user_data = mysqli_query($db_connection, "SELECT * FROM `users` WHERE user_email = '$user_email'");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" media="all" type="text/css">
<title>Home</title>
</head>
<div class="navbar">
  <a class="active" href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="show_jobs.php"><i>Show Jobs</i></a>
  <a href="show_jobs.php"><i>Add a job</i></a>
  <a href="logout.php" style="float:right"><i class="fa fa-fw fa-user"></i>Logout</a>
</div>
<body>
<div class="container">
<h1>Hello, <?php echo $userData['username'];?></h1>
</div>
</body>
</html>
