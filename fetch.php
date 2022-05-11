<?php

$connect = new PDO("mysql:host=localhost;dbname=jobs_for_ua", "root", "");

$output = '';

$query = '';

if(isset($_POST["query"]))
{
 $search = str_replace(",", "|", $_POST["query"]);
 $query = "
 SELECT * FROM jobs
 WHERE name REGEXP '".$search."'
 OR description REGEXP '".$search."'
 OR company REGEXP '".$search."'
 ";
}
else
{
 $query = "
 SELECT * FROM jobs ORDER BY id_job
 ";
}

$statement = $connect->prepare($query);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

echo json_encode($data);

?>
