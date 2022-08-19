<?php
  session_start();
  require ('actions/questions/showArticleContentAction.php'); 
  require ('actions/questions/postAnswerAction.php');
  require ('actions/questions/showAllAnswersOfQuestionAction.php');
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
    <section class="show-content">
      <h3><?= $question_title;?></h3>
      <hr>
      <p><?= $question_content;?></p>
      <hr>
      <small><?= $question_pseudo_author. ' ' .$question_publication_date;?></small>
    </section>
    <br>
    <section class="show-answers">
      <form class="form-group" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Réponse :</label>
          <textarea name="answer" class="form-control"></textarea>
          <br>
          <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
        </div>
      </form>
        <?php
          while ($answer = $getAllAnswerOfTheQuestion->fetch()) {
        ?>
            <div class="card">
              <div class="card-header">
                <?= $answer['pseudo_auteur']; ?>
                <br>
                <?= $answer['contenu']; ?>
              </div>
            </div>
            <br>
        <?php
          }
        ?>
    </section>
    <?php
     }
    ?>
    
    </div>
</body>
</html>