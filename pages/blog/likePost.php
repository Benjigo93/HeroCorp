<?php
    require __DIR__ . '/../../config/bootstrap.php';

    //Prépare la requete
    $prepare1 = $bdd->prepare('SELECT like_postLike FROM likepost WHERE user_postLike = :user AND id_postLike = :id');

    //Bind les valeurs
    $prepare1->bindValue(':user', getUserInfo());
    $prepare1->bindValue(':id', $_GET['id']);

    //Execute la requete
    $prepare1->execute();

    //Récupère la valeur
    $isLiked = $prepare1->fetch();
    //var_dump($isLiked);

    //Disliker le post si la personne a déja liké
    if(!$isLiked == false){
        if($isLiked['like_postLike'] == 1){
            //Prépare la requete
            $prepare = $bdd->prepare('UPDATE likepost SET like_postLike = 0 WHERE user_postLike = :user AND id_postLike = :id');

            //Bind les valeurs
            $prepare->bindValue(':user', getUserInfo());
            $prepare->bindValue(':id', $_GET['id']);

            //Execute la requete
            $prepare->execute();
        } else {
            //Prépare la requete
            $prepare = $bdd->prepare('UPDATE likepost SET like_postLike = 1 WHERE user_postLike = :user AND id_postLike = :id');

            //Bind les valeurs
            $prepare->bindValue(':user', getUserInfo());
            $prepare->bindValue(':id', $_GET['id']);

            //Execute la requete
            $prepare->execute();
        }
    } else {
        //Prépare la requete
        $prepare = $bdd->prepare('INSERT INTO likepost (id_postLike, user_postLike, like_postLike) VALUES (:id, :user, 1)');

        //Bind les valeurs
        $prepare->bindValue(':user', getUserInfo());
        $prepare->bindValue(':id', $_GET['id']);

        //Execute la requete
        $prepare->execute();
    }


    header('Location: blog.php');
