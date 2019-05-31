<?php 
    // Connexion à la base de données
    require __DIR__ . '/../config/bootstrap.php';

    // Prépare la requête
    try {
        $prepare = $bdd->prepare('INSERT INTO commentaires (id_post ,auteur_commentaire, contenu_commentaire, date_commentaire) VALUES ( :idPost , :auteurCom ,:contenuCom, NOW())');

        // Bind les valeurs
        $prepare->bindValue(':idPost', $_GET['post']);
        $prepare->bindValue(':auteurCom', $_POST['auteur_commentaire']);
        $prepare->bindValue(':contenuCom', $_POST['contenu_commentaire']);

        // Execute la requête
        $exec = $prepare->execute();
    } catch (PDOException $e){
        echo ' <p>Error with the query!<br /><br />
        The error is:<br /><br />', $e->getMessage(), '\n';
    }
    header('Location: ../pages/blog/commentaires.php?post='.$_GET['post']);


