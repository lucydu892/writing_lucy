<?php
    require 'views/header_view.php';
    require 'models/post_model.php';
    $userLogedIn = isset($_SESSION['userId']);

?>
<h1>Willkommen <?= $_SESSION['userName']; ?></h1>
<main>
    <div class="card">
        <?php foreach ($post as $postOnDb): ?> 
            <div class="card-header">
                <p>Am <?= $postOnDb["time"]?></p>
            </div>
            <div class="card-body">
            <p style="color: <?= $postOnDb["fontColor"] ?>;background-color: <?= $postOnDb["bgColor"] ?>;font-size: <?= $postOnDb["fontSize"].'px' ?>;font-family: <?= $postOnDb["fontFamily"] ?>;text-decoration: <?= $postOnDb["fontDeco"] ?>;"><?= htmlspecialchars($postOnDb["joke"]) ?></p>
                <p style="color: <?= $postOnDb["fontColor"] ?>;background-color: <?= $postOnDb["bgColor"] ?>;font-size: <?= $postOnDb["fontSize"].'px' ?>;font-family: <?= $postOnDb["fontFamily"] ?>;text-decoration: <?= $postOnDb["fontDeco"] ?>;"><?= htmlspecialchars($postOnDb["text"]) ?></p>
                <?php if (($postOnDb ['image']) !== '') { ?>
                <img src="<?= htmlspecialchars($postOnDb["image"]) ?>" class="card-img-top" alt="post" style="width: <?= $postOnDb["imageWidth"]. 'px'?>;height: <?= $postOnDb["imageHeight"].'px'?>;">
                <?php } else {?>
                <img src="images\defaultpicture.png" alt="default Picture" class="card-img-top" alt="post" style="width: 45%; height:auto;" >
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>
