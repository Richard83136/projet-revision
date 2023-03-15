<?php 
session_start();
include('bddconnect.php');
include('user.php');

if (isset($_GET['ordre']) && $_GET['ordre'] == 'inverse') {
$afficArt = $bdd->prepare("SELECT article, utilisateurs.firstname FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id  ORDER BY articles.id DESC;" ); $ordre = 'croissant';
}else{
    $afficArt = $bdd->prepare("SELECT article, utilisateurs.firstname FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id  ORDER BY articles.id ASC;" ); $ordre = 'inverse';
}
$afficArt->execute();
$result = $afficArt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $key => $value){
   
    ?><br><?php echo "L'utilisateur: ".$value['firstname'];?><br><?php
   echo "a posté l'article: ".$value['article'];?><br><br><?php
}
echo '<a href="articles.php?ordre=' . $ordre . '">Changer l\'ordre d\'affichage</a><br><br>';

?>
<button><a href="article.php">Créer un article</a>  </button>
<button><a href="deconnecter.php">Se deconnecter</a>  </button>
<button>Se deconnecter</a>  </button>
</body>
</html>