<?php
session_start();



try
{   $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'simplon2015');
} catch ( Exception $e ){
  die('Erreur : '.$e->getMessage() );}

  $newMail=$_POST['mail'];
  $newPseudo=$_POST['pseudo'];
  $newPW=$_POST['password'];

  if(isset($newMail)&&($newPseudo)&&($newPW)) {

    $req="INSERT INTO users VALUES(NULL,'$newMail','$newPseudo','$newPW')";
    $connexion->query($req);

    include 'index.php';

  } else {

    include 'inscription.php';
    echo 'Veuillez rentrer votre mail, pseudo et mot de passe.';

  };

  ?>
