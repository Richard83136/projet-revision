<?php 
session_start();
include('bddconnect.php');
include('user.php');
$user = new User();

 $user->disconnect();
 
 
 header("location:connection.php");
 ?>
