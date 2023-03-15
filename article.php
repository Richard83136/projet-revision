<?php 
session_start();
include('bddconnect.php');
include('user.php');


// var_dump($_SESSION);

    if(isset($_POST['submit'])){ 
    $article = $_POST['article'];
    $id_utilisateur = $_SESSION['user']['id'];
    $nouvelArticle = $bdd->prepare("INSERT INTO articles (article,id_utilisateur) VALUE (?,?)");
    $nouvelArticle->execute([$article,$id_utilisateur]);
   
     }
if(isset ($_SESSION['user'])){?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Révisions</title>
</head>

    
<body>      
    <h1 >Ajouter un article  </h1>  
        <form  action="" method="post">               
            <div>
                <input type="textarea" style="width:200px; height: 100px;" name="article"  >
                </div><br>
                <button type="submit" name="submit" >Envoyer</button>
                <div>
                    <button><a href="connection.php">se Connecter</a>  </button>
                    <button><a href="deconnecter.php">Déconnecter</a>  </button>
                    <button><a href="articles.php">Voir les articles</a>  </button>
                    
                </div>
        </form>
            </div>             
            
</body>          
</html>
<?php
}else{
    header("location:connection.php");
}

 