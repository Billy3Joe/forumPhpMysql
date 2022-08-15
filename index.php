<?php
session_start(); 
// Sécurisons cette page afin que les pirates n'ont pas accès dépuis l'URL
// Si la session n'est pas déclaré (active), alors on rédirige l'utilisateur à la l'espace de connexion
if (!$_SESSION['mdp']) {
    header('Location: connexion.php');
}
echo 'Bienvenue '. $_SESSION['pseudo'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   <a href="forum.php">
    <button>Accèder au forum</button>
   </a>
   <a href="deconnexion.php">
    <button>Se déconnecter</button>
   </a>
</body>
</html>