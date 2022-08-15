<?php
session_start(); 
// Sécurisons cette page afin que les pirates n'ont pas accès dépuis l'URL
// Si la variable $_SESSION['auth] n'est déclarée, alors on rédirige l'utilisateur vers la page login
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
}
echo 'Bienvenue '. $_SESSION['pseudo'];
?>