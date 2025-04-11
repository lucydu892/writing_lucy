<?php
require "models/post_model.php";
$userLogedIn = isset($_SESSION['userId']);
?>

<main class="postContent">
<h1>Willkommen <?= $_SESSION['userName']; ?></h1>   
    <div class="cards">
        <?php foreach ($post as $postOnDb): ?>
            <div class="card">
                <div class="card-header">
                    <p>Am <?= $postOnDb["time"] ?></p>
                </div>
                <div class="card-body" style="background-color: <?= $postOnDb["bgColor"] ?>">
                    <div class="card-text">
                        <p style="color: <?= $postOnDb["fontColor"] ?>;background-color: <?= $postOnDb["bgColor"] ?>;font-size: <?= $postOnDb["fontSize"] . 'px' ?>;font-family: <?= $postOnDb["fontFamily"] ?>;text-decoration: <?= $postOnDb["fontDeco"] ?>;"><?= htmlspecialchars($postOnDb["joke"]) ?></p>
                        <p style="color: <?= $postOnDb["fontColor"] ?>;background-color: <?= $postOnDb["bgColor"] ?>;font-size: <?= $postOnDb["fontSize"] . 'px' ?>;font-family: <?= $postOnDb["fontFamily"] ?>;text-decoration: <?= $postOnDb["fontDeco"] ?>;"><?= htmlspecialchars($postOnDb["text"]) ?></p>
                    </div>
                    <?php if (($postOnDb['image']) !== '') { ?>
                        <img src="<?= htmlspecialchars($postOnDb["image"]) ?>" class="card-img-top" alt="post" style="width: <?= $postOnDb["imageWidth"] . 'px' ?>;height: <?= $postOnDb["imageHeight"] . 'px' ?>;">
                    <?php } else { ?>
                        <img src="images\defaultpicture.png" alt="default Picture" class="card-img-top" alt="post" style="width: 45%; height:auto;">
                    <?php } ?>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
</main>