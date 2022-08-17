<?php 
  require('actions/questions/myQuestionsAction.php');
  require('actions/users/securityAction.php');
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
                <a href="#" class="btn btn-warning">Modifier lla question</a>
            </div>
          </div>
          <br>
      <?php 
        }
      ?>
   </div>
  <body>
</html>