<?php
require_once 'assets/config/bootstrap.php';
?>

  <?php include 'assets/inc/head.php' ?>

  <h1>Mini-Chat</h1>

  <?php 
  echo '<div class="messages">';
  $req = $pdo -> prepare(
    'SELECT *
    FROM messages
    '
  );

  $req -> execute();

  while($donnees = $req -> fetch()){
    echo '<p>' . strip_tags(($donnees['pseudo'])) . '<span class="message">' . strip_tags($donnees['message']) . '</span></p>';
  }
  echo '</div>'; 
  ?>

  <form action="minichat_post.php" method="post">
      <div>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" value="<?php $_POST['pseudo'] ?? '' ;?>">
      </div>
      <div>
        <label for="messages">Messages :</label>
        <textarea name="message" id="message"></textarea>
      </div>
      <input type="submit" name="send" value="Envoyer">
    <!-- <input type="text" name="messages" id="messages"> -->
  </form>

<?php include 'assets/inc/footer.php' ?>