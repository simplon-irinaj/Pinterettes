<?php
session_start();

$_SESSION['pseudo'] = $_POST['pseudo'];

$password = $_POST['password'];

$table = [];

try
{    $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'simplon2015');
} catch ( Exception $e ){
  die('Erreur : '.$e->getMessage() );
} $reponses = $connexion->query("SELECT * FROM users");

while($donnees = $reponses->fetch()){
  if (($_SESSION['pseudo'] == $donnees['pseudo'])&&($password == $donnees['password'])){
    $_SESSION['id'] = $donnees['id'];
    array_push($table, header('Location: accueil.php'));
  }
};
$reponses->closeCursor();

if($table === []){
  header('Location: inscription.php');
} else {
  echo $table[0];
}
?>
