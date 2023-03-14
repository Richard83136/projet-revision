<?php
session_start();
include('bddconnect.php');
include('user.php');
$user = new User();
if(!empty($_POST)){
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname'];

$user->register($login,$email,$firstname,$lastname,$password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Révisions</title>
</head>

    
<body>      
    <h1 >Inscription </h1>  
                        <form  action="inscription.php" method="post">
                            <div>
                                <label for="login">Choisissez votre Login:</label>
                                <input type="login" name="login"  >
                            </div>
                            <div>
                                <label for="email">Votre email:</label>
                                <input type="email" name="email"  >
                            </div>
                            <div>
                                <label for="firstname">Votre prénom:</label>
                                <input type="text" name="firstname" class="form-control form-control-lg" >
                            </div>
                            <div>
                                <label for="lastname">Votre nom:</label>
                                <input type="text" name="lastname" class="form-control form-control-lg" id="lastname">
                            </div>
                            <div>
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="password">
                            </div>
                            
                               
                            
                            
                            <button type="submit">Submit</button>
    
                        </form>
                    </div>
               
   
             
            
</body>          
</html>
