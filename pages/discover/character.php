<?php
    require __DIR__ . '/../../config/bootstrap.php';
    require '../../global/superHeroData.php';
    if(isset($_GET['s'])){
        $data = getHero($_GET['s']);
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
        <link rel="stylesheet" href="../../assets/style/discover.css">
        <link href="../../assets/style/style.css" rel="stylesheet">
        <title><?= $data['name']?></title>
    </head>
    <body>
        <?php include "../../global/header.php"; ?>
        <main class="hero">
            <div class="hero character">
                <div class="button__back">
                    <a href="all.php">
                        <div class="back">
                            <i class="fas fa-users"></i>
                        </div>
                    </a>
                </div>
                <div class="character__image">
                    <img src="<?= $data['image']['url'] ?>" alt="<?= $data['name'] ?>">
                </div>
                <div class="character__details">
                    <div class="character__name">
                        <h2><?= $data['name'] ?></h2>
                    </div>
                    <div class="character__fullname">
                        <h3><?= $data['biography']['full-name'] ?></h3>
                    </div>
                    <div class="character__biography biography">
                        <div class="biography--part1">
                            <div class="biography__aliases">
                                <h4> Alias :</h4>
                                <i class="fas fa-circle"></i>
                                <?php for ($alias = 0; $alias < sizeof($data['biography']['aliases']); $alias++ ){ ?>
                                    <span> <?= $data['biography']['aliases'][$alias] ?><?php if($alias<sizeof($data['biography']['aliases'])-1){echo',';}?> </span>
                                <?php } ?>
                            </div>
                            <div class="biography__history">
                                <h4> History :</h4>
                                <div class="biography__birth">
                                    <i class="fas fa-circle"></i>
                                    <p> <?= $data['name'] ?> is born in <?= $data['biography']['place-of-birth'] ?></p>
                                </div>
                                <div class="biography__firstApp">
                                    <i class="fas fa-circle"></i>
                                    <p> <?= $data['name'] ?> appears for the first time in <?= $data['biography']['first-appearance'] ?></p>
                                </div>
                                <div class="biography__work">
                                    <i class="fas fa-circle"></i>
                                    <p> <?= $data['biography']['full-name'] ?> is a <?= $data['work']['occupation'] ?> à <?= $data['work']['base'] ?></p>
                                </div>
                            </div>
                            <div class="biography__family">
                                <h4> Family :</h4>
                                <i class="fas fa-circle"></i>
                                <p> <?= $data['connections']['relatives'] ?> </p>
                            </div>
                        </div>
                        <div class="biography--part2">
                            <div class="biography__appearance">
                                <h4> Gender :</h4>
                                <p> <?= $data['appearance']['gender'] ?> </p>
                                <h4> Race :</h4>
                                <p> <?= $data['appearance']['race'] ?> </p>
                                <h4> Height :</h4>
                                <p> <?= $data['appearance']['height'][1] ?> </p>
                                <h4> Weight :</h4>
                                <p> <?= $data['appearance']['weight'][1] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <a href="?s=<?php if($_GET['s']==1){echo '731';}else{echo $_GET['s']-1;} ?>">
                        <div class="previous"><i class="fas fa-caret-left"></i></div>
                    </a>
                    <a href="?s=<?php if($_GET['s']==731){echo '1';}else{echo $_GET['s']+1;} ?>">
                        <div class="next"><i class="fas fa-caret-right"></i></div>
                    </a>
                </div>
            </div>
        </main>
    </body>
</html>

<?php
    } else {
        header('Location: discover.php');
    }
?>