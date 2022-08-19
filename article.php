<?php
  session_start();
  include 'actions/questions/showArticleContentAction.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/navbar.php'; ?>
  <br><br>
    <div class="container">
    <?php 
    //Si la variable $errorMsg est déclarée
    if (isset($errorMsg)) {
        //On affiche le contenu de cette variable $errorMsg
        echo $errorMsg;
    }
    ?>
    <?php
     //Vérifions si la dernière variable ($question_publication_date) a été déclarée (si elle existe)
     if (isset($question_publication_date)) {
    ?>
      <h3><?= $question_title;?></h3>
      <hr>
      <p><?= $question_content;?></p>
      <hr>
      <small><?= $question_pseudo_author. ' ' .$question_publication_date;?></small>
    <?php
     }
    ?>
    </div>
</body>
</html>