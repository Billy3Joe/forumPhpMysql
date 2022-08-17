<?php 
 session_start();
 require 'actions/database.php';
 ?>
<?php
//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si l'utilisateur a bien complété tous les champs
    if (!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])) {
      //Stockons toutes les données réccupérées de l'utilisateur dans des variables
       $user_pseudo = htmlspecialchars($_POST['pseudo']);
       $user_lastname = htmlspecialchars($_POST['lastname']);
       $user_firstname = htmlspecialchars($_POST['firstname']);
       //Crytons le mdp avec sha1();
       $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

       //Vérifions si l'utilisateur est déjà inscrit sur le site ou s'il existe déjà. On vérifie en fonction du pseudo entré par l'utilisateur
       $checkIfUserAlreadyExists =$bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ? ');
       $checkIfUserAlreadyExists->execute(array($user_pseudo));

       //Si l'utilisateur n'existe pas ou n'est pas encore inscrit 
       if ($checkIfUserAlreadyExists->rowCount() == 0) {
       //Insérons l'utilisateur n'existe pas ou n'est pas encore dans la bd
       $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES(?, ?, ?, ?)');
       $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));


       //Réccupérerons les données de l'utilisateur qui est inscrit
       $getInfoOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom =? AND prenom =? AND pseudo =?');
       $getInfoOfThisUserReq->execute(array($user_pseudo, $user_lastname, $user_firstname));
       $userInfos = $getInfoOfThisUserReq->fetch(); 
       
      //Authentifions l'utilisateur sur notre site et récupérer également ses données dans des variables globales globales sessions. On va utiliser des SESSIONS
       $_SESSION['auth'] = true;
       $_SESSION['id'] = $userInfos['id'];
       $_SESSION['pseudo'] = $userInfos['pseudo'];
       $_SESSION['lastname'] = $userInfos['nom'];
       $_SESSION['firstname'] = $userInfos['prenom'];

       //Rédirigeons l'uta vers la page index.php
       header('Location: index.php');
       }else {
        //Si l'utilisateur existe déjà,on affiche un message d'erreur
        $errorMsg = "L'utilisateur exite déjà sur le site...";
       }
    }else{
        
        $errorMsg = "Veiller completer tous les champs...";
    }
}
?>