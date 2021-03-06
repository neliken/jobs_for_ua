<?php
include "db_connection.php";
?>
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
            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="index.php">About</a></li>
            <li class="scroll-to-section"><a href="show_jobs.php">Jobs</a></li>
            <li class="scroll-to-section"><a href="info.php">Contact</a></li>
            <li class="scroll-to-section"><div class="border-first-button"><a href="login.php">Log In</a></div></li>
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

<div id="free-quote" class="free-quote">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
          <h4>Grow With Us Now</h4>
          <div class="line-dec"></div>
        </div>
      </div>
      <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
        <form id="search" action="#" method="GET">
          <div class="row">
            <div class="col-lg-8 col-sm-8">
              <fieldset>
                <input type="text" id="tags" name="text" class="website" placeholder="Enter the Job here ..." autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-4 col-sm-4">
              <fieldset>
                <button type="submit" class="main-button" id="search">Find the Job Now</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="blog" class="blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        <div class="blog-posts">
          <div class="row" id="123">

          </div>
        </div>
      </div>
    </div>
  </div>
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

 <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   dataType:"json",
   success:function(data)
   {
    $('#total_records').text(data.length);
    var html = '';
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {

      html += '<div class="col-lg-12">';
      html += '<div class="post-item">';
      html += '<div class="right-content">';
      html += '<div class="thumb">';
      html += '<a href="'+data[count].link_site+'"><img src="assets/images/'+data[count].photo+'" alt=""></a>';
      html += '</div>';

      html += '<br><span class="category">'+data[count].name+'</span> <br><br>';
      html += '<h6><em>'+data[count].company+'</em></h6> <br>';
      // html += '<span>'+data[count].category+'</span> <br>';
      html += '<span>'+data[count].description+'</span> <br>';
      // html += '<td><button>Send CV</button></td>';
      html += '   </div>';
      html += '   </div>';
      html += '   </div>';

     }
    }
    else
    {
     html = '<tr><td colspan="5">No Data Found</td></tr>';
    }
    $('#123').html(html);
   }
  })
 }

 $('#search').click(function(){
  var query = $('#tags').val();
  load_data(query);
 });

});
</script>
