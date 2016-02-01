<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pinterettes</title>
  <link rel="stylesheet" href="styles.css" media="screen" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link rel="icon" href="images/patin.ico" />
</head>
<body>
  <header id="header_profil">
  <h1>
    <?php
    echo $_SESSION['pseudo'];
    ?>
  </h1>
  <h3><a id="accueil" href="accueil.php">Accueil</a></h3>
  <button id="bouton_deco"><a href="index.php">Déconnexion</a></button>
  <form id="form_profil" action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
    <input type="file" name="images" value=""/>
    <label> Votre image ne doit pas dépasser 2Mo </label>
    <textarea name="titreImage" rows="1" cols="34">Donnez un titre à votre image :</textarea>
    <input type="submit" name="submit" value="Envoyer"/>
  </form>
</header>



  <?php
  try
  {    $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'simplon2015');
  } catch ( Exception $e ){
    die('Erreur : '.$e->getMessage() );}
    $idUser=$_SESSION['id'];
    $img_req = "SELECT * FROM images WHERE user_id = '$idUser'";
    $donnees = $connexion->query($img_req);
    while($img_perso = $donnees->fetch()){
      ?>
      <div class="container_images">
        <img class="images" src="<?php echo $img_perso['img_url'] ?>"/>
        <p class="texte"><?php echo $img_perso['img_name']?></p>
      </div>

      <?php
    }
    ?>

  </body>
  </html>
