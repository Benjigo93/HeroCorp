<?php
    require '../../global/superHeroData.php';
    require __DIR__ . '/../../config/bootstrap.php';
    $heroes = array();

    $heroRef = $_GET['page'] ?? 1;

    for ($hero = 0; $hero<50; $hero++){
        if ($heroRef == 1){
            array_push($heroes, getHero($hero+$heroRef));
        } else {
            array_push($heroes, getHero($hero+($heroRef*50)));
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/style/reset.css">
        <link rel="stylesheet" href="../../assets/style/style.css">
        <link rel="stylesheet" href="../../assets/style/discover.css">
        <title>All characters</title>
    </head>
    <body>
        <?php include "../../global/header.php"; ?>
        <main class="characters__container">
            <div class="characters">
                <?php for($character = 0; $character<$hero; $character++) {
                    if ($heroes[$character]['response'] !== 'error') {
                        ?>
                        <div class="character<?= $character ?> character">
                            <a href="character.php?s=<?= $heroes[$character]['id'] ?>">
                                <div class="character<?= $character ?>__name character__name">
                                    <h4><?= $heroes[$character]['name'] ?></h4>
                                </div>
                                <div class="character<?= $character ?>__image character__image">
                                    <img src="<?= $heroes[$character]['image']['url'] ?>"
                                         alt="<?= $heroes[$character]['name'] ?>">
                                </div>
                            </a>
                        </div>
                    <?php }
                }?>
                <div class="buttons">
                    <?php if($heroRef>1){?>
                        <div class="previous">
                            <a href="?page=<?=$heroRef-1?>"><i class="fas fa-caret-left"></i> <span>Previous</span> </a>
                        </div>
                    <?php } if($heroRef<14){?>
                        <div class="next">
                            <a href="?page=<?=$heroRef+1?>"> <span>Next</span> <i class="fas fa-caret-right"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </main>
    </body>
</html>
