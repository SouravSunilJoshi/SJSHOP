<?php
include('config/dbcon.php');

function getAllActive($table){
  global $con;
  $query = "SELECT * FROM $table WHERE status='0' ";
  return $query_run = mysqli_query($con,$query);
}

 ?>
