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
$id =$userData["user_id"];
if(isset($_POST['insert']))
    {
        $name = mysqli_real_escape_string($db_connection,$_POST['name']);
        $description = mysqli_real_escape_string($db_connection,$_POST['description']);
        $category = mysqli_real_escape_string($db_connection,$_POST['category']);
        $company = mysqli_real_escape_string($db_connection,$_POST['company']);

        $sql_insert = "INSERT INTO `jobs` (`name`,`description`, `category`, `company`, `id_user`)
            VALUES ('$name', '$description', '$category', '$company', '$id')";

          if(mysqli_query($db_connection,$sql_insert))
        {
            header('location:show_jobs.php');
        }else{
            die(mysqli_error($db_connection));
        }
    }
 ?>
<html lang="ro">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="jobs">
    <meta name="author" content="IXOBIT LTD">


     <title>Jobs portal</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="style.css">
 </head>
 <body>

   <div class="navbar">
     <a class="active" href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
     <a href="show_jobs.php"><i>Show Jobs</i></a>
     <a href="add_job.php"><i>Add a job</i></a>
     <a href="logout.php" style="float:right"><i class="fa fa-fw fa-user"></i>Logout</a>
   </div>
<br>
   <center>
       <div class="formular">
         <h1>Add a Job</h1>
         <form method="post">
           <input type="text" name="name" placeholder="Job name" required autocomplete="off">
           <input type="text" name="description" placeholder="Description" required autocomplete="off">
           <input type="text" name="category" placeholder="Category" required autocomplete="off">
           <input type="text" name="company" placeholder="Company" required autocomplete="off">

           <input type="submit" class="button" name="insert" value="Insert">
           <input type="reset" class="button" value="Reset">
         </form>
       </div>
  </center>
 </body>
</html>
