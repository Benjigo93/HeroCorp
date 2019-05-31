<?php 
    // Connexion à la base de données
    require __DIR__ . '/../../config/bootstrap.php';

    if (getUserInfo() === $_GET['user']) {
       // Prépare la requête
       $prepare = $bdd->prepare('DELETE FROM commentaires WHERE id= :idPost');

       // Bind les valeurs
       $prepare->bindValue(':idPost', $_GET['id']);

       // Execute la requête
       $exec = $prepare->execute();

        $message = 'Your comment has been deleted.';
    } else {
        $message = 'You can not delete this comment.';
    }

    ?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../../assets/style/reset.css" rel="stylesheet">
        <link href="../../assets/style/style.css" rel="stylesheet">
        <title>HeroCorp | Comment Deleted</title>
    </head>
    <body>
    <?php include "../../global/header.php";?>
    <main class="deletedComment">
        <div class="deletedComment__message">
            <span><?= $message ?></span>
            <a href="blog.php">Go Back</a>
        </div>
    </main>
    </body>
    </html>
