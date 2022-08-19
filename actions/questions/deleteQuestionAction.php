<?php 
  require '../database.php';
  session_start();
  // Sécurisons cette page afin que les pirates n'ont pas accès dépuis l'URL
  // Si la variable $_SESSION['auth] n'est déclarée, alors on rédirige l'utilisateur vers la page login
    if (!isset($_SESSION['auth'])) {
        header('Location: ../../login.php');
    }
?>
<?php 
    //Vérifier si l'identifiant de la question de que l'on veut supprimer est bien passé dans l'URL
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        //Vérifier si l'identifiant entré par l'utilisateur existe
        $idOfTheQuestion = $_GET['id'];
        $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
        $checkIfQuestionExists->execute(array($idOfTheQuestion));

        //Vérifier si la question existe en comptant le nombre de questions en fonction de l'identifiant 
        //Si le nombre est supérieur à 0 ça veut dire que la question existe
       if ($checkIfQuestionExists->rowCount() > 0) {

            //Vérifier si l'utilisateur qui essaie de supprimer la question est l'auteur de la question
            $questionsInfos = $checkIfQuestionExists->fetch(); 
            if ($questionsInfos['id_auteur'] == $_SESSION['id']) {

                // Requête de suppréssion de la question
                $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
                $deleteThisQuestion->execute(array($idOfTheQuestion));

                //Rédirection vers la page my-question.php
                header('Location: ../../my-questions.php');
            }else {
                $errorMsg = "Vous n'avez pasle droit de supprimer la question une question qui ne vous appartient pas !";
            }
           //Si le nombre est inférieur à 0 ça veut dire que la question n'existe pas
        }else{
            $errorMsg = "Aucune question n'a été trouvée";
        }
    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }
?>