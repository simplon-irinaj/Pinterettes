<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bienvenue sur Pinterettes</title>
  <link rel="stylesheet" href="styles.css" media="screen" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link rel="icon" href="images/patin.ico" />
</head>
<body>
  <header id="header">
    <h2>
      <a href="profil.php" id="hello"><?php echo 'Bonjour '.$_SESSION['pseudo']?></a>
    </h2>
    <h1 id="titre_accueil">
      Pinterettes, le site des bêtes et du skate (ou des bêtes de skate).
    </h1>
    <form id="search" method="post">
      <input id="input_search" type="text" name="search" value="Rechercher"/>
    </form>
  </header>
  <div>
    <?php
    try
    {    $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'simplon2015');
    } catch ( Exception $e ){
      die('Erreur : '.$e->getMessage() );
    } $images = $connexion->query("SELECT * FROM images INNER JOIN users ON images.user_id = users.id");
    while ($req_images = $images->fetch()){
      ?>
      <div class="container_images">
        <img class="images" src="<?php echo $req_images['img_url']?>"/>
        <p class="texte"><?php echo $req_images['img_name']?></p>
        <p class="texte">Posté par : <?php echo $req_images['pseudo']?></p>
      </div>
      <?php
    };
    ?>
  </div>
</body>
</html>
