<?php
session_start();
header('Location: profil.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <?php


  $dossier = 'images/';
  $fichier = basename($_FILES['images']['name']);
  $taille_maxi = 2000000;
  $taille = filesize($_FILES['images']['tmp_name']);
  $extensions = array('.png', '.gif', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['images']['name'], '.');
  //Début des vérifications de sécurité...
  if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
  {
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
  }
  if($taille>$taille_maxi)
  {
    $erreur = 'Le fichier est trop gros...';
  }
  if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
  {
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['images']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
      $idUser=$_SESSION['id'];
      $imageName=$_POST['titreImage'];

      try
      {   $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'simplon2015');
      } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );}

        $req="INSERT INTO images VALUES(NULL,'$idUser','images/$fichier','$imageName')";
        $connexion->query($req);


      }
      else
      {
        echo 'Echec de l\'upload !';
      }
    }
    else
    {
      echo '$erreur';
    }
    ?>

  </body>
  </html>
