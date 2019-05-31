<?php
    // Connexion à la base de données
    require __DIR__ . '/../config/bootstrap.php';

    // Prépare la requête
    $prepare = $bdd->prepare('INSERT INTO posts (titre_post, contenu_post, date_post, user_post) VALUES (:titre, :contenu, NOW() , :username)');

    // Bind les valeurs
    $prepare->bindValue(':titre', $_POST['titre_post']);
    $prepare->bindValue(':contenu', $_POST['contenu_post']);
    $prepare->bindValue(':username', $_POST['user_post']);

    // Execute la requête
    $exec = $prepare->execute();

    header('Location: ../pages/blog/blog.php');