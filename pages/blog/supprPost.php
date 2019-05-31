<?php 
    // Connexion à la base de données
    require __DIR__ . '/../../config/bootstrap.php';

    if (getUserInfo() === $_GET['user']){
       // Prépare la requête
       $prepare = $bdd->prepare('DELETE FROM posts WHERE id= :post');
       $prepare2 = $bdd->prepare('DELETE FROM commentaires WHERE id_post= :idpost');

       // Bind les valeurs
       $prepare->bindValue(':post', $_GET['post']);
       $prepare2->bindValue(':idpost', $_GET['post']);

       // Execute la requête
       $exec = $prepare->execute();
       $exec2 = $prepare2->execute();

       $message = 'Your post has been deleted.';
    } else {
        $message = 'You can not delete this post.';
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
        <title>HeroCorp | Post Deleted</title>
    </head>
    <body>
        <?php include "../../global/header.php";?>
        <main class="deletedPost">
            <div class="deletedPost__message">
                <span><?= $message ?></span>
                <a href="blog.php">Go Back</a>
            </div>
        </main>
    </body>
    </html>
