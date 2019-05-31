<?php
    require __DIR__ . '/../../config/bootstrap.php';
    ?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="../../assets/style/reset.css" rel="stylesheet">
    <link href="../../assets/style/style.css" rel="stylesheet">
    <title>HeroCorp - New Post</title>
</head>
<body>
    <?php include "../../global/header.php"; ?>
    <main class="newPost__position--sections">
       <div class="new__post">
          <div class="post__title">
              <span class="post">Post</span>
          </div>
          <form action="../../global/insertPost.php" method="POST" enctype="multipart/form-data" class="new__post--text">
             <input type="text" name="user_post" value="<?php echo getUserInfo() ?>" readOnly="readOnly" class="user_post"/>
             <div class="inputs--titlePost">
                <input type="text" name="titre_post" placeholder="Title" class="input__title" />
                <textarea name="contenu_post" rows="10" cols="50" placeholder="Your story.." value="Post" class="validate__post"></textarea>
             </div>
             <div class="validate__button">
                 <button type="submit" name="newPost" value="Post" class="submit__button"><i class="far fa-paper-plane"></i></button>
             </div>
          </form>
       </div>
       <div class="topComment">
            <?php include '../profile/asideProfile.php';?>
            <?php include '../profile/topComment.php';?>
       </div>
    </main>
</body>
</html>