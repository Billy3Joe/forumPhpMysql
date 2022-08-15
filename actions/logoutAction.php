<?php
//Démarrage de la session
session_start(); 
//Stockons toutes les dans un array et ensuite détruisons tous ces sessions
$_SESSION =array();
//Détruissons  tous les sessions qui se trouvent dans le tableau (au niveau de toutes les pages de notre site internet)
session_destroy();
//Rédirigeons vers la page de connexion
header('Location: ../login.php');
?>