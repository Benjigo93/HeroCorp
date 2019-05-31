<?php
include "../config/bootstrap.php";

$req = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo_user = :pseudo');
$req->bindParam(':pseudo', $_POST['pseudo']);
$req->execute();

$req2 = $bdd->prepare('SELECT * FROM utilisateur WHERE email_user = :email');
$req2->bindParam(':email', $_POST['email']);
$req2->execute();

$checkPseudo = $req->fetch(PDO::FETCH_ASSOC);
$checkEmail = $req2->fetch(PDO::FETCH_ASSOC);

//echo '<pre>' . print_r($_POST, true) . '</pre>';

// Vérifier l'envoi du formulaire
if (!isset($_POST['ajouter'])){
    header('Location: ../pages/login/inscription.php?e=0');
} else {
    // Le pseudo ne doit pas être vide
    if (empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['repeatpassword'])) {
        header('Location: ../pages/login/inscription.php?e=1');

    } elseif($checkPseudo !== false) {
        header('Location: ../pages/login/inscription.php?e=2');

    } elseif($checkEmail !== false) {
        header('Location: ../pages/login/inscription.php?e=3');

    } elseif (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 15) {
        header('Location: ../pages/login/inscription.php?e=4');

        // Caractères non-autorisés MDP
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
        header('Location: ../pages/login/inscription.php?e=5');

        // Caractères non-autorisés
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])) {
        header('Location: ../pages/login/inscription.php?e=6');

        // Validité de l'email
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header('Location: ../pages/login/inscription.php?e=7');

    } elseif ($_POST['password']!==$_POST['repeatpassword']) {
        header('Location: ../pages/login/inscription.php?e=8');

    } else {
        //Si tout va bien...
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req = $bdd->prepare('INSERT INTO utilisateur(name_user, surname_user, pseudo_user, email_user, password_user) VALUES(:name, :surname, :pseudo, :email, :password)');

        $req->bindValue(':name', $_POST['nom']);
        $req->bindValue(':surname', $_POST['prenom']);
        $req->bindValue(':pseudo', $_POST['pseudo']);
        $req->bindValue(':email', $_POST['email']);
        $req->bindValue(':password', $password);

        $exec = $req->execute();

        session_write_close();
        header('Location: ../index.php?s');
    }
}
