<?php

$link = new mysqli('localhost', 'root', '', 'jobs_for_ua');

if(!$link){
  die("ERROR: Could not connectt. " . mysqli_error($con));
}
 ?>
