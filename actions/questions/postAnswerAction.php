<?php 
 require 'actions/database.php';?>
<?php
//Valider le formulaire
if (isset($_POST['validate'])) {
   //Vérifions si les champs ne sont pas vide
 if (!empty($_POST['answer'])) {
   //Sockons les dans des variables les données de la question
   //NB: la fonction nl2br permet de mettre des scaux de lignes automatique
   $user_answer = nl2br(htmlspecialchars($_POST['answer']));
   //Insérons le contenu (les données) de ses variables dans dans la bd
   $insererAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur, id_question, contenu)VALUES(?, ?, ?, ?)');
   //Exécutons notre requête
   $insererAnswer->execute(
       array(
        $_SESSION['id'], 
        $_SESSION['pseudo'],
        $idOfTheQuestion,
        $user_answer 
        )
    ); 
    $successMsg = "Votre reponse a bien été envoyé sur le site";
 }else{
    $errorMsg = "Veillez compléter le champ...";
 }
}
?>