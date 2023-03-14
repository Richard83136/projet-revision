<?php
class User {
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    //création du constructeur
public function __construct(){
    // pour la connexion à la base de donnée
    $servername = 'localhost';
    $dbname = 'révisions';
    $username = 'root';
    $password = '';

    // on essaie la connexion
    try{
        $this->bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);

    // gestion des erreurs de PDO sur Exception
    $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Votre connexion à la base de donnée est bonne<br>";
    }catch(PDOException $e){
        echo "Echec : " .$e->getMessage();
        exit;
    
}
    
} // creation de la fonction d'inscription (enregistrement)
 public function register($login,$email,$firstname,$lastname,$password){
    if(!empty ($login) && !empty($email) && !empty($password) && !empty($firstname) && !empty($lastname) ){
    $nouvelUser = $this->bdd->prepare("INSERT INTO utilisateurs (login,  email, firstname, lastname,password) VALUES (?,?,?,?,?)");
    $nouvelUser->execute([$login,$email,$firstname,$lastname,$password]);
    $_SESSION['login'] = $login;
    $donneesUser = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login= ?");
    $donneesUser->execute([$_SESSION['login']]);
    $result = $donneesUser->fetchAll(PDO::FETCH_ASSOC);
    echo "Votre inscription s'est correctement déroulée<br>";
    return $result; 
 }
}
//creation fonction connect 
 public function connect($login, $password){
    $donneesUser = $this->bdd->prepare("SELECT login,password FROM utilisateurs WHERE login= ? AND password = ?");
    $donneesUser->execute([$login,$password]);

    if($donneesUser->rowCount()>0){
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        echo 'Bienvenue sur votre connexion: '.$login."<br>";
       
    }else{
     echo "Login ou password inconnu dans notre base de donnée";
    }    
 }
//creation fonction disconnect
 public function disconnect(){
    echo "Vous avez été déconnecté";
    session_destroy();
 }
 //creation fonction is connect
 public function isConnect(){
    if(isset($_SESSION['login'])){
        echo "utilisateur isConnected<br>";
    }else{
        echo "utilisateur notConnected<br>";
        return false;
    }
 }


 public function getLogin(){
    return $this->login;
 }
 public function getEmail(){
    return $this->email;
 }
 public function getFirstname(){
    return $this->firstname;
 }
 public function getLastname(){
    return $this->lastname;
 }
}

$user = new User();
//inscription test
//$user->register("ric", "123","rs@rs.com","richard","S");

//connection test ?
// $user->isConnect();

//Seconnecter à la bdd
// $user->connect("ric","123");
// $user->isConnect();

//deconnection
//$user->disconnect();










        
?>
