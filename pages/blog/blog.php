<?php
    require __DIR__ . '/../../config/bootstrap.php';
    include  '../../global/sortFeed.php';
    if(!$_SESSION == null){
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
        <title>HeroCorp - <?= getUserInfo(); ?> </title>
    </head>
    <body>
        <?php include "../../global/header.php"; ?>
        <main class="content__blog">
            <div class="trending">
                <div class="title__post">
                    <h1 class="title__post--h1">Feed</h1>
                    <div class="tri__date__like">
                        <a href="blog.php?tri=date" class="tri__like">By date</a><br>
                        <a href="blog.php?tri=nbLike" class="tri__like">Per like</a><br>
                    </div>
                </div>
                <?php while ($donnees = $req->fetch()){?>
                <div class="news__container">
                    <div class="author">
                        <span><?php echo $donnees['user_post']; ?></span>
                    </div>
                    <div class="news">
                        <h3 class="title__content"> <?php echo htmlspecialchars($donnees['titre_post']); ?> </h3>
                        <p class="content__news"> <?php echo nl2br(htmlspecialchars($donnees['contenu_post'])); ?> </p>
                            <?php include  '../../global/fetchFeedData.php'; ?>
                    </div>
                    <div class="likeAndcomments">
                        <a href="likePost.php?id=<?= $donnees['id']?>">
                            <i class="fas fa-thumbs-up userLike<?=$userLiked['like_postLike']?>"></i>
                            <span class="userLike<?=$userLiked['like_postLike']?>"><?= $resultatLike?></span>
                        </a>
                        <a href="commentaires.php?post=<?php echo $donnees['id']; ?>" class="button__comments">Comments</a>
                        <em class="date__publication"> <?php echo $donnees['date_creation_fr']; ?> </em>
                    </div>
                </div>
                <?php } $req->closeCursor(); ?>
            </div>
            <div class="topComment">
                <?php include '../profile/asideProfile.php';?>
                <?php include '../profile/topComment.php';?>
            </div>
        </main>
    </body>
</html>

<?php } else {
        header("Location: ../../index.php");
    } ?>