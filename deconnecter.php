<?php 
session_start();
include('bddconnect.php');
include('user.php');
$user = new User();

 $user->disconnect();
 
 
 
 ?>
 <button><a href="connection.php">se Connecter</a>  </button>
                    <button><a href="deconnecter.php">Déconnecter</a>  </button>