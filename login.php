<?php require 'actions/users/loginAction.php';?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<div class="fullcontent">
    <div class="headings">
        <h1>FORUM GENERAL POUR TOUS</h1>
        <h2>QUSTIONS <br> ET <br> REPONSES</h2>
    </div>
    <div class="formbox">
        <h3>SIGNIN</h3>
        <form id="form" action="" method="POST">
            <label for="">Pseudo</label>
            <input type="text" name="pseudo" placeholder="pseudo" class="asd"/>
            <label for="">Password</label>
            <input type="password" id="" name="password" placeholder="password" class="asd"/>
            <button id="btn" type="submit" name="validate" class="mainbox">Signin</button>
            <input id="btn" type="reset" value="Reset" class="mainbox">
            <label for="">Nouveau membre?</label>
            <a href="signup.php" class="mainbox">Inscrit toi d'abord</a>
             <!-- Affichage du message de la variable erreur déclarée dans signupAction.php -->
            <?php 
              // On vérifie si la variable $errorMsg existe si c'est le cas, elle sera affichée
              if (isset($errorMsg)) {
              echo '<p style="color:red;">'.$errorMsg.'</p>';
            }
            ?>
        </form>	
    </div>
</div>
   
</body>
</html>