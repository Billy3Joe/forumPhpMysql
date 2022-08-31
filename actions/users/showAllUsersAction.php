<?php require ('actions/database.php');?>
<?php 
 //Affichons les questions par défaut sans recherche qui vont s'afficher en dessous de la barre de recherche
 $getAllUsers = $bdd->query('SELECT * FROM users ORDER BY id DESC');

?>