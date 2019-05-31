<?php
    switch ($_GET['tri'] ?? null) {
        case 'date':
            $req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , like_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC');
            break;

        case 'nbLike':
            $req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , like_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY like_post DESC');
            break;

        default:
            $req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , like_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC');
            break;
    }    
