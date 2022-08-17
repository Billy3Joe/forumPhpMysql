<?php require 'actions/database.php';?>
<?php 
 //Récupérons les questions par défaut sans recherche qui vont s'afficher en dessous de la barre de recherche
 $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

 //Occupons nous maintenant de la recherche
 //Pour cela vérifions que la variable surch est bien passé en paramètre dans l'URL
 //Vérifier si une recherche a été rentrée par l'utilisateur
 if (isset($_GET['search']) AND !empty($_GET['search'])) {
    
    //Stockons la recherche de l'utilisateur dans $usersSearch se trouvant dans l'URL
    $usersSearch = $_GET['search'];

    //Récupérons toutes les questions correspondantes à la recherche de l'utilisateur (en fonction du titre)
    $getAllQuestionsSearch = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%"'.$usersSearch.'%" ORDER BY id DESC');
 }
?>