<?php
    require __DIR__ . '/../../config/bootstrap.php';
    require '../../global/superHeroData.php';
    if(isset($_GET['q'])){
        $data = getHero(('search/'.rawurlencode($_GET['q'])));
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../../assets/style/reset.css" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/style/discover.css">
        <link href="../../assets/style/style.css" rel="stylesheet">
        <title>Results for <?=$_GET['q']?></title>
    </head>
    <body>
        <?php include "../../global/header.php"; ?>
        <main class="results">
            <div class="results__display">
                <div class="title">
                    <h1>Results for </h1>
                    <h1 class="name"><?=$_GET['q']?></h1>
                </div>
                <?php if ($data['response'] !== 'error') { ?>
                    <div class="results__found">
                    <?php for ($result = 0; $result < sizeof($data['results']); $result++) { ?>
                        <div class="result<?= $result ?> result">
                            <a href="character.php?s=<?= $data['results'][$result]['id'] ?>">
                                <h3><?= $data['results'][$result]['name'] ?></h3>
                                <div class="result__image">
                                    <img src="<?= $data['results'][$result]['image']['url'] ?>"
                                         alt="<?= $data['results'][$result]['name'] ?>">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="error">
                        <h3>We couldn't find '<?= $_GET['q']?>' :(</h3>
                    </div>
                <?php } ?>
            </div>
        </main>
    </body>
</html>

<?php
    } else {
        header('Location: discover.php');
    }
?>