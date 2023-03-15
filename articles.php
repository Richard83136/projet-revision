<?php 
session_start();
include('bddconnect.php');
include('user.php');

if (isset($_GET['ordre']) && $_GET['ordre'] == 'decroissant') {
$afficArt = $bdd->prepare("SELECT article, utilisateurs.firstname FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id  ORDER BY articles.id DESC;" ); $ordre = 'croissant';
}else{
    $afficArt = $bdd->prepare("SELECT article, utilisateurs.firstname FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id  ORDER BY articles.id ASC;" ); $ordre = 'decroissant';
}
$afficArt->execute();
$result = $afficArt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $key => $value){
   
    ?><br><?php echo "L'utilisateur: ".$value['firstname'];?><br><?php
   echo "a posté l'article: ".$value['article'];?><br><br><?php
}
echo '<button><a href="articles.php?ordre=' . $ordre . '">Changer l\'ordre d\'affichage</a></button><br><br>';

?>
<button><a href="article.php">Créer un article</a>  </button>
<button><a href="deconnecter.php">Se deconnecter</a>  </button>

</body>
</html>