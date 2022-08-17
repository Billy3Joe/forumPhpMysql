<?php
   session_start();
   require 'actions/users/securityAction.php';
   require 'actions/questions/getInfosOfEditedQuestionAction.php';
   require 'actions/questions/editQuestionAction.php';
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/navbar.php'; ?>
 
  <br><br>
  <div class="container">
    <?php 
      if (isset($errorMsg)) {  
        echo '<p>' . $errorMsg . '</p>'; 
        }
    ?>

    <?php 
    //On vérifie avec la dernière variable en sachant que si elle est vérifiée, tout le reste est également vérifier
      if (isset($question_content)) {
      ?>
        <form method="POST">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">L'objet de la question</label>
              <input type="text" class="form-control" name="title" value="<?= $question_title ?>">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Description de la question</label>
              <textarea class="form-control" name="description"><?= $question_description ?></textarea>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
              <textarea class="form-control" name="content"><?= $question_content ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="validate">Modifier la quetion</button>
      </form>
      <?php
      } 
    ?>
  </div>
</body>
</html>