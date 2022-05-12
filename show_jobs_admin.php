<?php
session_start();
require 'db_connection.php';
// CHECK USER IF LOGGED IN
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){

$user_email = $_SESSION['user_email'];
$get_user_data = mysqli_query($db_connection, "SELECT * FROM `users` WHERE user_email = '$user_email'");
$data =  mysqli_fetch_assoc($get_user_data);

}else{
header('Location: logout.php');
exit;
}

if(isset($_GET['deleteid'])){

  $id=$_GET['deleteid'];
  $sql1 ="SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0";
  $result1 = mysqli_query($db_connection, $sql1);
  $sql2 = "delete from jobs where id_job= $id ";

  if(mysqli_query($db_connection, $sql2)){
      header('location: show_jobs_admin.php');
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


        <title>Show Jobs</title>
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
          <a href="home.php" class="logo">
            <img src="assets/images/logo12.png" alt="">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="home.php" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="show_jobs_admin.php">Show Jobs</a></li>
            <li class="scroll-to-section"><a href="add_job.php">Add a Job</a></li>
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

<div id="blog" class="blog">
  <div class="container">
    <div class="row">
       <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
         <div class="blog-posts">
           <div class="row" id="123">

             <?php
              $sql="Select * from jobs join users on jobs.id_user=users.user_id where users.user_email='$user_email'";
              $result = mysqli_query($db_connection, $sql);
              if($result){
                while ($row =mysqli_fetch_assoc($result)) {
                   $id=$row['id_job'];
                   $name=$row['name'];
                   $description=$row['description'];
                   $photo=$row['photo'];
                   $link_site=$row['link_site'];
                   $company =$row['company'];

       echo '
               <div class="col-lg-12">
                  <div class="post-item">
                   <div class="right-content">
                    <div class="thumb">
                     <a href="'.$link_site.'"><img src="assets/images/'.$photo.'" alt="c"></a>
                    </div>
                    <span class="category">'.$name.'</span> <br><br>
                    <h6><em>'.$company.'</em></h6>
                    <span>'.$description.'</span> <br> <br>
                    <span class="col-lg-6"><a href="update_job.php?updateid='.$id.'">Edit</a></span><br>
                    <span class="col-lg-6"><a  href="show_jobs.php?deleteid='.$id.'">Delete</a> </span>
                   </div>
                  </div>
                </div>
                ';
              }
            }?>
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
