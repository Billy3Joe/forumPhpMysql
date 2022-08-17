<?php  
 require 'actions/database.php';?>
<?php 
//Requête pour afficher tous les questions par ordre décroissant
$getAllMyQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));
?>