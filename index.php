<?php
session_start();
require 'bd.php';
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  <?php require 'partes/header.php' ?>
  <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Te has logeado de manera exitosa
      <a href="logout.php">Logout</a>
      <br><br><br><a href="carrito.php" target="_blank">Carrito de bolsa</a>


    <?php else: ?>
  <h1>Porfavor ingresa o regsitrate</h1>
      
      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
      <?php endif; ?>   
  </body>
</html>


