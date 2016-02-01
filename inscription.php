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
  <link rel="icon" href="images/patin.ico" />
  <body>
    <h1 id="titre">Inscription à Pinterettes :</h1>
    <form id="accueil" action="inscription_bd.php" method="post">
      <label class="login_pw" for="mail">Entrez votre mail </label>
      <input type="text" name="mail" placeholder="Entrez votre mail"/>
      <label class="login_pw" for="pseudo">Entrez un pseudo </label>
      <input type="text" name="pseudo" placeholder="Entrez un pseudo"/>
      <label class="login_pw" for="password">Entrez un mot de passe </label>
      <input type="password" name="password" placeholder="Entrez un mot de passe"/>       <!-- type="password" et pas text pour avoir les mots cryptés -->
      <label class="login_pw" for="password">Confirmez le mot de passe </label>
      <input type="password" name="password" placeholder="Confirmez le mot de passe"/>
      <button class="login_pw" id="bouton" type="submit" name="submit">OK</button>
    </form>



  </body>
  </html>
