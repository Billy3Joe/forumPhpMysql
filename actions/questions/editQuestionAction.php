<?php require 'actions/database.php';?>
<?php 

    // else {
    //   $errorMsg = "Veillez completer tous les champs...";
    // }
?>
<?php
//Récupérons l'id qui a été envoyé vers l'URL de la page
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    //Vérifions si l'identifiant récupéré correspond bien à un de la base de donnée
   //Exécutons une requête préparée
   $idOfQuestion = $_GET['id'];
   //Récupérons tous les infos correspondant à l'article qui possède cet identifiant
   $recupQuestion = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
   $recupQuestion->execute(array($idOfQuestion));
   //Si recupArticle n'est pas vide ie si l'id existe dans la BD, alors on va exécuter notre code sinon on renvoit un message d'aucun membre n'a été trouvé
   if ($recupQuestion->rowCount() > 0) {
       //Récupérons en premier son titre et sa description que nous avons affiché dans l'expression value=""; du formulaire ci-dessous
       //Stockons tous ces informations à l'intérieur d'une variable
       $questionInfos = $recupQuestion->fetch();
       //Récupérons le titre, la description et le contenu dans la bd
       $titre = $questionInfos['titre'];
       $description =str_replace('<br />', '', $questionInfos['description']);
       //la fonction str_replace() permet de remplacer les balises <br></br>qui s'affichent dans la zone du textarea par le vide
       $contenu =str_replace('<br />', '', $questionInfos['contenu']);
       
       if(isset($_POST['validate'])) {
        //Récupérons tous les valeurs qui ont été saisie par l'utilisateur
        $new_question_title = htmlspecialchars($_POST['titre']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));
       //Effectuons une requête de modification maintenant au niveau de notre BD
        $updateQuestion = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        //Exécution de la Requête de modification
        $updateQuestion->execute(array($new_question_title,$new_question_description, $new_question_content, $idOfQuestion));
       //Rédirigeons l'utilisateur
       header('Location:  my-questions.php');
 
       }
   }else {
       echo "Aucun article trouvé";
   }
   }else {
       echo "Aucun identifiant trouvé";
   }

?>





