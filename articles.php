<?php 
session_start();
include('bddconnect.php');
include('user.php');

$afficArt = $bdd->prepare("SELECT article, utilisateurs.firstname FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id  ORDER BY articles.id DESC;" );
$afficArt->execute();
$result = $afficArt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $key => $value){
   
    ?><br><?php echo "L'utilisateur: ".$value['firstname'];?><br><?php
   echo "a posté l'article: ".$value['article'];?><br><br><?php
}

?>
</body>
</html>