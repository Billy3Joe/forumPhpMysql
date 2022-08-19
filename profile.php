<?php 
  session_start();
  require('actions/users/securityAction.php');
  require('actions/users/showOneUersProfileAction.php');
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
                echo $errorMsg;
            }

            if (isset($getHisQuestions)) {
        ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo; ?></h4>
                        <p><?= $user_lastname . ' ' . $user_firstname ?></p>
                    </div>
                    <br>
                    <?php
                    while ($question = $getHisQuestions->fetch()) {
                    ?>
                      <div class="header">
                       <?= $question['titre']; ?>
                      </div>
                      <br>
                      <div class="body">
                       <?= $question['description']; ?>
                      </div>
                      <br>
                      <div class="footer">
                          Par  <strong><?= $question['pseudo_auteur'];?></strong> le <?= $question['date_publication']; ?>    
                      </div>
                      <hr>
                    <?php
                    }
                    ?>
                </div>
        <?php 
            }
        ?>
    </div>
  <body>
</html>