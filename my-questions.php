<?php 
  session_start();
  require('actions/users/securityAction.php');
  require('actions/questions/myQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/navbar.php'; ?>
  <br><br>
  <div class="container">
    <?php 
          //On affiche tous les questions dans l-onglet Mes questions
          while($question = $getAllMyQuestions->fetch()){
      ?> 
     
        <div class="card">
            <div class="card-header">    
              <a href="article.php?id=<?= $question['id'];?>">
                <?= $question['titre'];?>
              </a>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $question['description']; ?></p>
                <p class="card-text"><?= $question['contenu']; ?></p>
                <a href="article.php?id=<?= $question['id'];?>" class="btn btn-primary">Accéder à la question</a>
                <a href="edit-question.php?id=<?= $question['id']; ?> " class="btn btn-warning">Modifier la question</a>
                <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?> " class="btn btn-danger"> Supprimer la question</a>
            </div>
          </div>
          <br>
      <?php 
        }
      ?>
   </div>
  <body>
</html>