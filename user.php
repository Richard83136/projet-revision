<?php
include('bddconnect.php');



class User {
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    //création du constructeur
public function __construct($login,$email,$firstname,$lastname,$password,$bdd){

   $this->login = $login;
   $this->password = $password;
   $this->email = $email;
   $this->firstname = $firstname;
   $this->lastname = $lastname;
   $this->bdd = $bdd;

    // pour la connexion à la base de donnée
    

    // on essaie la connexion
   //  try{
   //      $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);

   //  // gestion des erreurs de PDO sur Exception
   //  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   //  }catch(PDOException $e){
   //      echo "Echec : " .$e->getMessage();
   //      exit;
    
// }
    
} // creation de la fonction d'inscription (enregistrement)
 public function register(){
    if(!empty ($login) && !empty($email) && !empty($password) && !empty($firstname) && !empty($lastname) ){
    $nouvelUser = $bdd->prepare("INSERT INTO utilisateurs (login,  email, firstname, lastname,password) VALUES (?,?,?,?,?)");
    $nouvelUser->execute([$login,$email,$firstname,$lastname,$password]);
    $_SESSION['login'] = $login;
    $donneesUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login= ?");
    $donneesUser->execute([$_SESSION['login']]);
    $result = $donneesUser->fetchAll(PDO::FETCH_ASSOC);
    
   
    echo "Votre inscription s'est correctement déroulée<br>";
    return $result; 
 }
}
//creation fonction connect 
 public function connect($login, $password, $bdd){
    $donneesUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login= ? AND password = ?");
    $donneesUser->execute([$login,$password]);
    $result = $donneesUser->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $result;
    if($donneesUser->rowCount()>0){
      $_SESSION['user'] = serialize($this);
      
        echo 'Bienvenue sur votre connexion: '.$login."<br>";
        var_dump($_SESSION['user']);
        echo "</br>";
        var_dump(unserialize($_SESSION['user']));

      //  header("location:article.php");
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
 public function update($login,$password,$email,$firstname,$lastname,$bdd){
   $updateUser = $bdd->prepare("UPDATE utilisateurs SET login =?, password =?, email =?, firstname =?, lastname =? WHERE login =?");
   $updateUser->execute([$login,$password,$email,$firstname,$lastname,$_SESSION['user']['login']]);
   $_SESSION['user']['login'] = $_POST['login'];
   $_SESSION['user']['password'] = $_POST['password'];
   $_SESSION['user']['email'] = $_POST['email'];
   $_SESSION['user']['firstname'] = $_POST['firstname'];
   $_SESSION['user']['lastname'] = $_POST['lastname'];
   if(isset($_SESSION['login'])){

       echo "Les modifications demandées ont bien été enregistrées";
   }else{
       echo "Aucun utilisateur connecté pour modifier les renseignements";
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
//$user->isConnect();

//deconnection
//$user->disconnect();

        
?>
