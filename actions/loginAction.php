<?php require 'actions/database.php';?>
<?php
//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si l'utilisateur a bien complété tous les champs
    if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {

      //Stockons toutes les données réccupérées de l'utilisateur dans des variables
       $user_pseudo = htmlspecialchars($_POST['pseudo']);
       //Ici nous ne souhaitons pas crypter le mdp de l'utilisateur. On veut juste vérifier si le mdp crypté est le même avec celui-ci non crypté;
       $user_password = htmlspecialchars($_POST['password']);

      //Vérifions d'abord si l'utilisateur existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

       //Vérifions si les pseudo existe
        if ($checkIfUserExists->rowCount() > 0) {

           //Vérifions si les deux mdp sont pareil en utilisant la fonction password_verify()
           //Créons une variable $usersInfos qui stock tous les informations de l'utilisateur
           $usersInfos = $checkIfUserExists->fetch();
           if (password_verify($user_password, $usersInfos['mdp'])) {

            //Authentifions l'utilisateur sur notre site et récupérer également ses données dans des variables globales globales sessions. On va utiliser des SESSIONS
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];

            //Rédirigeons l'utilisateur vers la page d'accueil index.php
            header('Location: index.php ');

           }else {
            $errorMsg = "Votre mot de passe est incorrect...";
           }
        }else {
        $errorMsg = "Votre pseudo est incorrect...";
        }
    }else{
        
        $errorMsg = "Veiller completer tous les champs...";
    }
}
?>