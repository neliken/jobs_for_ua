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

$id=$_GET['updateid'];
$sql="Select * from `jobs` where id_job='$id'";
$result=mysqli_query($db_connection, $sql);
$row = mysqli_fetch_assoc($result);

$name=$row['name'];
$description=$row['description'];
$category=$row['photo'];
$company =$row['company'];
if(isset($_POST['update']))
    {
      $name=$_POST['name'];
      $description=$_POST['description'];
      $category=$_POST['category'];
      $company =$_POST['company'];


         $sql = "UPDATE `jobs` set `name`='$name', `description`= '$description', `photo`='$category', `company`='$company' where `id_job`= '$id'";

          if(mysqli_query($db_connection,$sql))
        {
            header('location:show_jobs_admin.php');
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


     <title>Update Jobs</title>
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
                   <h4>Update <?php echo $name; ?> Job</h4>
                   <fieldset>
                     <input type="text" name="name" placeholder="Job Name"  value="<?php echo $name; ?>" autocomplete="on" required>
                   </fieldset>
                   <fieldset>
                     <input type="text" name="description" placeholder="Description"  value="<?php echo $description; ?>" required>
                   </fieldset>
                   <fieldset>
                     <input type="file" name="category" placeholder="Category" value="<?php echo $category; ?>" required>
                   </fieldset>
                   <fieldset>
                     <input type="text" name="company" placeholder="Company"  value="<?php echo $company; ?>"  autocomplete="off">
                   </fieldset>
                 </div>
                 <div class="col-lg-6">
                   <fieldset>
                     <input name="updateid" value = "<?php echo $id; ?>" style = "display: none; " />
                   </fieldset>
                 </div>
                 <div class="col-lg-12">
                   <fieldset>
                     <!-- <button type="reset" name="insert" class="main-button ">Reset</button> -->
                     <button type="submit" name="update" class="main-button ">Update</button>
                   </fieldset>
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
