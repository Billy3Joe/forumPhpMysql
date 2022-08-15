<?php
// Sécurisons cette page afin que les pirates n'ont pas accès dépuis l'URL
// Si la variable $_SESSION['auth] n'est déclarée, alors on rédirige l'utilisateur vers la page login
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
}
// echo '<center style="padding-top: 30px; font-weight: bold; text-transform: uppercase; font-size: 30px;">'.'Bienvenue '. $_SESSION['pseudo'].'</center>';
?>