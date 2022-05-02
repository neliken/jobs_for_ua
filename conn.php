<?php

$link = new mysqli('localhost', 'root', '', 'jobs_for_ua');

if(!$link){
  die("ERROR: Could not connect. " . mysqli_error($con));
}
 ?>
