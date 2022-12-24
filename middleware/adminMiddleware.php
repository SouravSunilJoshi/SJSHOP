<?php

include('../functions/myfunctions.php');

if(isset($_SESSION['auth'])){
  if($_SESSION['role_as'] != 1){
    $_SESSION['message']="You are not authorized";
    header('Location: ../index.php');
  }
}
else{
  $_SESSION['message']="Login to Continue";
  header('Location: ../login.php');
}
 ?>
