<?php 
  require('actions/database.php');
  //Vérifions si l'identifiant de la question est entré en paramètre dans k'URL
  if (isset($_GET['id']) AND !empty($_GET['id'])) {
    //Vérifions si cet identifiant appartient bel et bien à une question
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $idOfTheQuestion = $_GET['id'];
    $checkIfQuestionExists ->execute(array($idOfTheQuestion));
    //Vérifions si on a bien pu réccupérer la question (si la question existe)
        if ($checkIfQuestionExists ->rowCount() > 0) {
        //Récupérons les données (les question ) si elle a bien été trouvée
        $questionsInfos = $checkIfQuestionExists ->fetch();

        //Stockons tous ces données récupérées dans des différentes variables
        $question_title = $questionsInfos['titre'];
        // $question_description = $questionsInfos['description'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];

        //On les affiche au niveau de notre fichier article.php
        }else {
           $errorMsg = "Aucune questions n'a été trouvée";
        }
  }else{
    $errorMsg = 'Aucun question n\'a été trouvée';
  }
?>