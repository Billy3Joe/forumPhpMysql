<?php require 'actions/database.php';?>
<?php 
 $getAllAnswerOfTheQuestion = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
 $getAllAnswerOfTheQuestion->execute(array($idOfTheQuestion));
?>