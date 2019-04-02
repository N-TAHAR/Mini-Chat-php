<?php

require_once 'assets/config/bootstrap.php';

if(isset($_POST['send'])){

  if(!empty($_POST['pseudo']) && !empty($_POST['message'])){
    
    $req = $pdo -> prepare(
      'INSERT INTO messages (pseudo, message)
      VALUE (?, ?)
      '
    );
    $req -> execute(array($_POST['pseudo'], $_POST['message']));

    $_SESSION['pseudo'] = $_POST['pseudo'];

      // On redirige sur la page d'accueil
    }
  header('Location: /Mini-Chat-php');
}

