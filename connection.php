<?php 
session_start();
include('bddconnect.php');
include('user.php');
$user = new User();
if(!empty($_POST['login']) && !empty($_POST['password'])){
$login = $_POST['login'];
$password = $_POST['password'];
$user->connect($login,$password);
// $user->isConnect();
    
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
    <h1 >Vous connecter ?  </h1>  
                        <form  action="" method="post">
                            <div>
                                <label for="login">Votre Login:</label>
                                <input type="login" name="login"  >
                            </div> 
                             <div>
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="password">
                            </div>
                              <button type="submit">Submit</button>
    
                        </form>
                    </div>
                    <button><a href="article.php">Créer un article</a>  </button>

</body>          
</html>
