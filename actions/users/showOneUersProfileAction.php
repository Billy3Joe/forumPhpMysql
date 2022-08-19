<?php require ('actions/database.php');?>
<?php
//Récupérons l'identifiant de l'utilisateur
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        //Vérifions si l'utilisateur existe
        $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');

        //L'identifiant de l'utilisateur
        $idOfUser = $_GET['id'];

        $checkIfUserExists->execute(array($idOfUser));

         //Vérifions si l'utilisateur existe
        if ($checkIfUserExists->rowCount() > 0) {

            //Récupérons tous les données de l'utilisateur se trouvant dans le tableau
            $usersInfos = $checkIfUserExists->fetch();

            //Stockons tous ses données dans des différentes variables
            $user_pseudo = $usersInfos['pseudo'];
            $user_lastname = $usersInfos['nom'];
            $user_firstname = $usersInfos['prenom'];

            //Récupérons tous les questions peubliées par l'utilisateur
            $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
            $getHisQuestions->execute(array($idOfUser));
        }else{
            $errorMsg = "Aucun utilisateur trouvé";
        }
    }else{
        $errorMsg = "Aucun utilisateur trouvé";
    }
?>