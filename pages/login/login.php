<?php

require __DIR__ . '/../../config/bootstrap.php';
require __DIR__ . '/../../global/loginCheck.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/style/reset.css" rel="stylesheet"/>
    <link href="assets/style/login.css" rel="stylesheet"/>
    <title>HeroCorp | Login</title>
</head>
<body>
    <div class="page__login">
        <div class="container__login">
            <div class="form_title">
                <h1>HeroCorp</h1>
                <h3>Sign Up</h3>
                <?php if(isset($messageError)){echo '<h4 class="error">'.$messageError.'</h4>';} ?>
                <?php if(isset($_GET['s'])){echo '<h4 class="success"> You have been successfully registered :) </h4>';} ?>
                <?php if(isset($logout)){echo '<h4 class="success"> You have been successfully logged out :) </h4>';} ?>
            </div>
            <form class="login__form" action="index.php" method="post" id="loginform">
                <div class="form-group">
                    <label for="username">Email or Username :</label>
                    <input id="username" type="text" name="identifiant" class="form-control" maxlength="10">
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input id="password" type="password" name="password" class="form-control">
                </div>
            </form>
            <div class="login__signin">
                <p class="signin">Not member yet ? <a href="pages/login/inscription.php">Sign in</a></p>
            </div>
            <div class="login__submit">
                <button type="submit" name="login" form="loginform"> Log In </button>
            </div>
        </div>
    </div>
</body>
</html>


        
   