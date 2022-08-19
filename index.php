<?php
  session_start();
  require ('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/navbar.php'; ?>
  <br><br>

<!-- On va afficher une barre de recherche permettant aux utilisateurs d'effectuer une recherche concernant n'importe quelle questions sur le forum -->
<div class="container">
  <form action="" method="GET">
    <div class="form-group row">
     <div class="col-md-8">
       <input type="search" name="search" placeholder="Search..." class="form-control">
     </div>
     <div class="col-md-4">
       <button type="submit" class="btn btn-success">Rechercher</button>
     </div>
    </div>
  </form>
  <br>
<!-- Affichage de tous les données de la recherche -->
  <?php 
    while($question =  $getAllQuestions->fetch()) {
  ?>
  <div class="card">
    <div class="card-header">
      <a href="article.php?id=<?= $question['id'];?>">
        <?= $question['titre'];?>
      </a>
    </div>
    <div class="card-body">
      <?= $question['description'];?>
    </div>
    <div class="card-footer">
      Publier par 
      <a href="profile.php?id=<?= $question['id_auteur'] ?>" style="text-decoration:none;">
            <?= $question['pseudo_auteur'];?> 
      </a> 
         le <?= $question['date_publication'];?>
    </div>
  </div>
  <br>
  <?php
    }
  ?>
</div>

</body>
</html>