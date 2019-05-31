<?php require __DIR__ . '/../../config/bootstrap.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="../../assets/style/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/discover.css">
    <link href="../../assets/style/style.css" rel="stylesheet">
    <title>Herocorp - Discover</title>
</head>
<body>
    <?php include "../../global/header.php"; ?>
    <main class="discover">
        <div class="discover__interface">
            <div class="navigation">
                <a href="all.php"><div class="navigation__link"><span>All characters</span></div></a>
                <a href="character.php?s=<?= mt_rand(1, 731)?>"><div class="navigation__link"><span>Random</span></div></a>
            </div>
            <div class="searchbar">
                <form action="search.php" method="get" id="search">
                    <label for="name">Search for your hero: </label>
                    <input type="text" name="q" id="name">
                    <button type="submit"><i class="fab fa-searchengin"></i></button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
