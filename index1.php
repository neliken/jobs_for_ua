
<?php
include "db_connection.php";
?>

<html lang="ro">
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="description" content="jobs">
       <meta name="author" content="IXOBIT LTD">
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live Data Search using Multiple Tag in PHP with Ajax</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<style>
.bootstrap-tagsinput {
 width: 100%;
}
</style>

        <title>Jobs portal</title>

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

        <center>
        <br>
        <h1>Jobs for Refugees</h1>
      <div class="container">
         <div class="form-group">
          <div class="row">
           <div class="col-md-10">
            <input type="text" id="tags" class="form-control" data-role="tagsinput">
           </div>
           <div class="col-md-2">
            <button type="button" name="search" class="btn btn-primary" id="search">Search</button>
           </div>
          </div>
         </div>
        <br>
 <div class="table-responsive">
  <div align="right">
   <p><b>Total Records - <span id="total_records"></span></b></p>
  </div>
  <table class="table table-bordered table-striped">
   <thead>
    <tr>
     <th>Name</th>
     <th>Description</th>
     <th>Category</th>
     <th>Company</th>
     <th>Send CV</th>
    </tr>
   </thead>
   <tbody>
   </tbody>
  </table>
 </div>
</div>
<div style="clear:both"></div>
<br />

<br />
<br />
<br />
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
      html += '<tr>';
      html += '<td>'+data[count].name+'</td>';
      html += '<td>'+data[count].description+'</td>';
      html += '<td>'+data[count].category+'</td>';
      html += '<td>'+data[count].company+'</td>';
      html += '<td><button>Send CV</button></td>';

     }
    }
    else
    {
     html = '<tr><td colspan="5">No Data Found</td></tr>';
    }
    $('tbody').html(html);
   }
  })
 }

 $('#search').click(function(){
  var query = $('#tags').val();
  load_data(query);
 });

});
</script>
