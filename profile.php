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
                        <div style="display: flex; gap:10px;">
                          <h3>PEUDO:</h3>
                          <h3 style="color:#888;">@<?= $user_pseudo; ?></h3>
                        </div>
                        <br>
                        <div style="display: flex; gap:10px;">
                          <h3>NOM & PRENOM: </h3>
                          <h3 style="color:#888;"><?= $user_lastname . ' ' . $user_firstname ?></h3>
                        </div>
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

        <h1>TOUS LES UTILISTEURS</h1>
        <hr>
        <!-- Affichage de tous les données de la recherche -->
        <?php require ('actions/users/showAllUsersAction.php'); ?>
        <?php 
          while($user = $getAllUsers->fetch()) {
        ?>
        <div class="card">
          <div class="card-header">
            <a href="#">
              <?= $user['pseudo'];?>
            </a>
          </div>
          <div class="card-body">
            <?= $user['nom'];?>  <?= $user['prenom'];?>
          </div>
        </div>
        <?php
          }
        ?>
        <br>
        <br>
      </div>
    </div>
  <body>
</html>