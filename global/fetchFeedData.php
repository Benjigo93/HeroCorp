<?php
    $req1 = $bdd->prepare('SELECT COUNT(*) FROM likepost WHERE id_postLike = :idPostLike AND like_postLike = 1');
    //On bind les valeurs
    $req1->bindValue(':idPostLike', $donnees['id']);
    //On exécute la requète
    $req1->execute();
    //On récupère le résultat
    $resultatLike = $req1->fetchColumn();
    // Requête pour determiner le like de l'user
    $req2 = $bdd->prepare('SELECT like_postLike FROM likepost WHERE id_postLike = :idPostLike AND user_postLike = :user');
    //On bind les valeurs
    $req2->bindValue(':idPostLike', $donnees['id']);
    $req2->bindValue(':user', getUserInfo());
    //On exécute la requète
    $req2->execute();
    //On récupère le résultat
    $userLiked = $req2->fetch();
    //Requete de mise à jour
    $req3 = $bdd->prepare('UPDATE posts SET like_post = :likesPost WHERE id = :idPostLike');
    //BindValue
    $req3->bindValue(':likesPost', $resultatLike);
    $req3->bindValue(':idPostLike', $donnees['id']);
    //Execute la requete
    $req3->execute();