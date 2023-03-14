<?php 
$servername = 'localhost';
$dbname = 'révisions';
$username = 'root';
$password = '';
// on essaie la connexion
    try{
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    }catch(PDOException $e){
        echo "Echec : " .$e->getMessage();
        
    
}
    
