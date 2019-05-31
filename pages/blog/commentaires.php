<?php
    // Connexion à la base de données
    require __DIR__ . '/../../config/bootstrap.php';

    // Récupération du billet
    $req = $bdd->prepare('SELECT id, user_post ,titre_post, contenu_post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
    $req->execute(array($_GET['post']));
    $donnees = $req->fetch();

    $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

    // Récupération des commentaires
    $req = $bdd->prepare('SELECT id, auteur_commentaire, contenu_commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_post = ? ORDER BY date_commentaire');
    $req->execute(array($_GET['post']));
    if(!$donnees == null){
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="../../assets/style/reset.css" rel="stylesheet">
        <link href="../../assets/style/style.css" rel="stylesheet">
        <title>HeroCorp | <?php echo htmlspecialchars($donnees['titre_post']);?> </title>
    </head>
    <body>
        <?php include "../../global/header.php";?>
        <main class="content__inComments">
            <div class="content__blog--comments">
                <div class="title__page--comments">
                    <h2><?php echo htmlspecialchars($donnees['titre_post']);?></h2>
                    <a href="supprPost.php?post=<?= $_GET['post']?>&user=<?= $donnees['user_post'] ?>" class="button__delete--post"><i class="fas fa-times-circle"></i> </a>
                </div>
                <div class="post__comments--incomments">
                    <div class="post__news">
                        <p class="contenu__post--onpost"><?php echo nl2br(htmlspecialchars($donnees['contenu_post'])); ?> </p>
                        <div class="bottom__ofeachpost">
                            <em class="date__publication"> <?php echo $donnees['date_creation_fr']; ?> from <?php echo $donnees['user_post'] ?></em>
                        </div>
                    </div>
                    <?php while ($donnees = $req->fetch()) { //Début boucle commentaires ?>
                        <div class="comments_container">
                            <div class="comments_head">
                                <span><?php echo htmlspecialchars($donnees['auteur_commentaire']); ?></span>
                                <a href="supprCommentaire.php?id=<?= $donnees['id']?>&post=<?= $_GET['post']?>&user=<?= $donnees['auteur_commentaire']?>"><i class="fas fa-times-circle"></i></a>
                            </div>
                            <span><?php echo $donnees['date_commentaire_fr']; ?></span>
                            <p><?php echo nl2br(htmlspecialchars($donnees['contenu_commentaire']));?></p>
                        </div>
                    <?php } // Fin de la boucle des commentaires
                    $req->closeCursor(); ?>
                    <form class="form__comment" action="../../global/insertCommentaire.php?post=<?= $_GET['post'] ?>" method="POST" enctype="multipart/form-data">
                        <input type="text" name="auteur_commentaire" value="<?php echo getUserInfo() ?>" readOnly="readOnly" class="user_post" />
                        <label for="commentaire">Comment:</label>
                        <textarea name="contenu_commentaire" rows="10" cols="50" id="commentaire"></textarea>
                        <div class="button__post--comment">
                            <a href="blog.php"><button>Back</button></a>
                            <input type="submit" name="ok" value="Send" class="submit__button">
                        </div>
                    </form>
                </div>
            </div>
            <div class="topComment">
                <?php include '../profile/asideProfile.php';?>
                <?php include '../profile/topComment.php';?>
            </div>
        </main>
    </body>
</html>
<?php } else {
        header("Location: blog.php");
    } ?>