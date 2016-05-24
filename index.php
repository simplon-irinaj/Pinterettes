<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>pinterettes</title>
  <link rel="stylesheet" href="styles.css" media="screen" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link rel="icon" href="images/square.ico" />
  <body>
    <h1 id="titre">Bienvenue sur Canvas </h1>
    <form id="accueil" action="functions.php" method="post">
      <label class="login_pw" for="pseudo">Pseudo</label>
      <input class="login_button" type="text" name="pseudo" placeholder="Entrez un pseudo"/>
      <label class="login_pw" for="password">Mot de passe</label>
      <input class="login_button" type="password" name="password" placeholder="Entrez un mot de passe" />       <!-- type="password" et pas text pour avoir les mots cryptés -->
      <button class="login_button" id="bouton" type="submit" name="submit">OK</button>
    </form>
    <a id="inscription" href="inscription.php">Pas d'identifiant ni de mot de passe ?</a>
  </body>
  </html>
