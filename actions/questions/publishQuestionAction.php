<?php 
 session_start(); 
 require 'actions/database.php';?>
<?php
//Valider le formulaire
if (isset($_POST['validate'])) {
   //Vérifions si les champs ne sont pas vide
 if (!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])) {
   //Sockons les dans des variables les données de la question
   $question_title = htmlspecialchars($_POST['title']);
   //NB: la fonction nl2br permet de mettre des scaux de lignes automatique
   $question_description = nl2br(htmlspecialchars($_POST['description']));
   $question_content = nl2br(htmlspecialchars($_POST['content']));
   $question_date = date('d/m/y');
   $question_id_author = $_SESSION['id'];
   $question_pseudo_author = $_SESSION['pseudo'];
   //Insérons le contenu (les données) de ses variables dans dans la bd
   $insererQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication)VALUES(?, ?, ?, ?, ?, ?)');
   //Exécutons notre requête
   $insererQuestionOnWebsite->execute(
       array(
          $question_title, 
          $question_description, 
          $question_content, 
          $question_id_author, 
          $question_pseudo_author, 
          $question_date
        )
    ); 
    $successMsg = "Votre question a bien été publié sur le site";
 }else{
    $errorMsg = "Veillez compléter tous les champs...";
 }
}
?>