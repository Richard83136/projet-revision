<?php 
session_start();
include('bddconnect.php');
include('user.php');


if(isset($_POST['modifier'])){
  $user = new User;
  $user->update($_POST['login'],$_POST['password'],$_POST['email'],$_POST['firstname'],$_POST['lastname'],$bdd);  
}
// var_dump($_SESSION);
?>






<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1>Profil de <?= $_SESSION['user']['login']; ?></h1>
    <form action="" method="POST">
        <label for="login">Login d'utilisateur :</label>
        <input type="text"  name="login" value="<?= $_SESSION['user']['login']; ?>"><br>

        <label for="firstname">Prénom d'utilisateur :</label>
        <input type="text"  name="firstname" value="<?php echo $_SESSION['user']['firstname']; ?>"><br>

        <label for="lastname">Prénom d'utilisateur :</label>
        <input type="text"  name="lastname" value="<?php echo $_SESSION['user']['lastname']; ?>"><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email"  name="email" value="<?php echo $_SESSION['user']['email']; ?>"><br>

        <label for="password">Mot de passe :</label>
        <input type="password"  name="password"><br>

        <label for="confirm_password">Confirmer le mot de passe :</label>
        <input type="password"  name="confirm_password"><br>

        <input type="submit" name="modifier" >
    </form>
    
    <?php 
    // header("location : connection.php");
?>
<button><a href="deconnecter.php">se deconnecter</a></button>




</body>
</html>