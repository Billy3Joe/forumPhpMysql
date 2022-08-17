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
          //On affiche tous les questions
          while($question = $getAllMyQuestions->fetch()){
      ?> 
     
        <div class="card">
            <div class="card-header">    
               <?php echo $question['titre']; ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $question['description']; ?></p>
                <a href="#" class="btn btn-primary">Accéder à la question</a>
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