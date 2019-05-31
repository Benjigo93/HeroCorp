<?php
    //Traitement du formulaire de connexion
    if (isset($_POST['identifiant']) || isset($_POST['password'])) {
        $req = $bdd->prepare(
            'SELECT * 
            FROM utilisateur
            WHERE 
              email_user = :login
              OR pseudo_user = :login'
        );
        $req->bindParam(':login', $_POST['identifiant']);
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            // Si aucun utilisateur n'a été trouvé
            $messageError = 'No user found';
        } else {
            if(!$_POST['password'] || !password_verify($_POST['password'], $user['password_user'])) {
                // Si le mot de passe est incorrect
                $messageError = 'Incorrect password';
            } else {
                // On enregistre l'utilisateur en session
                $_SESSION['pseudo'] = $user['pseudo_user'];
                unset($user['password']);

                // On redirige sur la page d'acceuil
                session_write_close();
                header("Location: pages/blog/blog.php"); /*?user=" . getUserInfo())*/
            }
        }
    }
    // Déconnexion de l'utilsateur courant
    if (isset($_GET['logout'])) {
        unset($_SESSION['pseudo']);
        $logout = true;
    }