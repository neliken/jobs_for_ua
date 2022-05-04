
<?php
include "db_connection.php";
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
        <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="index.php" style="float:right"><i class="fa fa-fw fa-user"></i> Login</a>
      </div>

        <center>
        <br><br>
        <h1>Jobs for Refugees</h1>
        <br><br>
        <form action="/" >
            <input type="text" placeholder="Search for jobs .." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="search-box">
          <input type="text" autocomplete="off" placeholder="Search country..." />
          <div class="result"></div>
        </div>
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
                <th>Send CVffffff</th>
            </tr>
          <?php
        $sql="Select * from job";
        $result = mysqli_query($db_connection, $sql);
        if($result){
        while ($row =mysqli_fetch_assoc($result)) {
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
            <td><button>Send CV</button></td>
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