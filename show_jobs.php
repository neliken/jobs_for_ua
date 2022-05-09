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

if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
  $sql1 ="SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0";
  $result1 = mysqli_query($db_connection, $sql1);
  // $sql = "delete user_animal from user_animal join animal on user_animal.id_animal=animal.id_animal where user_animal.id_animal = $id;";
 $sql2 = "delete from jobs where id_job= $id ";
  if(mysqli_query($db_connection, $sql2)){
      header('location: show_jobs.php');
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
        <a href="show_jobs.php"><i>Add a job</i></a>
        <a href="logout.php" style="float:right"><i class="fa fa-fw fa-user"></i>Logout</a>
      </div>

        <center>
        <br><div class="container">
                  <?php $user= $userData['username']; ?>
        <h1>Hello, <?php echo $user;?></h1><br>
        <h1>Jobs for Refugees</h1>
        <br><br>
        </center>
        <div class="">
          <center>
          <table>
            <tr>
                <th>Position</th>
                <th>Job description</th>
                <th>Location</th>
                <th>Employer</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
          <?php
        $sql="Select * from jobs join users on jobs.id_user=users.user_id where users.username='$user'";
        $result = mysqli_query($db_connection, $sql);
        if($result){
        while ($row =mysqli_fetch_assoc($result)) {
          $id=$row['id_job'];
          $name=$row['name'];
          $description=$row['description'];
          $category=$row['category'];
          $company =$row['company'];

    echo '
        <tr>
            <td>'.$name.'</td>
            <td>'.$description.'</td>
            <td>'.$category.'</td>
            <td>'.$company.'</td>
            <td><button>Edit</button></td>
            <td><button><a href="show_jobs.php?deleteid='.$id.'">Delete</a></button></td>
        </tr>
    ';
  }
}
 ?>
 </table>
 </center>
        </div>
    </body>

</html>
