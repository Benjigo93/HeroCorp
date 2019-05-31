<?php
    require '../../global/signinWarning.php';
    include '../../global/googleOath.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../assets/style/reset.css" rel="stylesheet">
    <link href="../../assets/style/signup.css" rel="stylesheet" />
    <title>HeroCorp | Sign In</title>
</head>
    <body>
        <div class="home">
            <a href="../../index.php">
                <img src="../../assets/img/logo.png" alt="HeroCorp">
            </a>
        </div>
        <div class="left__signup">
        </div>
        <div class="right__signup">
            <h1>JOIN US.</h1>
            <?php if(isset($errorMessage)){ echo '<h4>'.$errorMessage.'</h4>'; } ?>
            <form action="../../global/validation.php" method="post" class="formulary">
                <label for="pseudo">Your SuperHero Name :</label>
                <input type="text" name="pseudo" id="pseudo" maxlength="10"><br>
                <div class="row__name">
                    <div>
                            <label for="firstName">First Name :</label><br>
                            <input type="text" name="prenom" class="row__name-user" id="firstName" <?php if(isset($_GET['code'])){echo "value=".$response->given_name;}?>><br>
                    </div>
                    <div>
                            <label for="lastName">Last Name :</label><br>
                            <input type="text" name="nom" class="row__name-user" id="lastName"<?php if(isset($_GET['code'])){echo "value=".$response->family_name;}?>><br>
                    </div>
                </div>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" <?php if(isset($_GET['code'])){echo "value=".$response->email;}?>>
                <br>
                <div class="row__name">
                        <div>
                                <label for="password">Password :</label><br>
                                <input type="password" name="password" id="password"><br>
                        </div>
                        <div>
                                <label for="confirmPassword">Confirm password :</label><br>
                                <input type="password" name="repeatpassword" id="confirmPassword">
                                <br>
                        </div>
                    </div>
                <button type="submit" name="ajouter">Sign In</button>
            </form>
            <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email profile&access_type=online&redirect_uri=http://localhost/herocorp/pages/login/inscription.php&response_type=code&client_id=<?= GOOGLE_ID ?>">
                <button class="google"><span>Sign in with</span><img src="../../assets/img/google.png"></button>
            </a>
        </div>
    </body>
</html>
