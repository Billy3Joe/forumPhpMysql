<?php require 'actions/database.php';?>
<?php 
//Vérifions si l'identifiant de la question de la question à bien été passé en pramètre dans l'URL
if (isset($_GET['id']) AND !empty($_GET['id'])) {
   //Vérifions si la question present sur le site appartient à l'utilisateur bel et bien connecté
   $idOfQuestion = $_GET['id'];
   $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
   $checkIfQuestionExists->execute(array($idOfQuestion));

   if ($checkIfQuestionExists->rowCount() > 0) {
    //Récupérer les données de la question
    $questionInfos = $checkIfQuestionExists->fetch();
    
        if ($questionInfos['id_auteur'] == $_SESSION['id']) {
           $question_title = $questionInfos['titre'];
           $question_description = $questionInfos['description'];
           $question_content = $questionInfos['contenu'];

           // str_replace(); est une fonction permettant de remplacer les balises <br> et autres par le vide
           $question_description = str_replace('<br>', '', $question_description);
           $question_content = str_replace('<br>', '', $question_content);
        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
            }
    }else{
        $errorMsg = "Aucune question n'a été trouvée";
   }
}else{
    $errorMsg = "Aucune question n'a été trouvée";
}

?>