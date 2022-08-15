<?php require 'actions/users/signupAction.php';?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<!-- Affichage du messge de la variable erreur déclarée dans signupAction.php -->
<?php 
// On vérifie si la variable $errorMsg existe si c'est le cas, elle sera affichée
if (isset($errorMsg)) {
 echo '<p>'.$errorMsg.'</p>';
}
?>
<body>
    <br><br>
    <form class="container" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
    <button type="reset" class="btn btn-primary">Réinitialiser</button>
    <br><br>
    <a href="login.php"><p>J'ai déjà un compte , je me connecte</p></a>
    </form>
</body>
</html>