<?php
require "models/post_model.php";
$userLogedIn = isset($_SESSION['userId']);
?>

<main class="postContent">
    <?php if (strpos($_SERVER['REQUEST_URI'], 'post') !== false): ?>
        <link rel="stylesheet" href="css/post.css">
    <?php endif; ?>
    <h1>Willkommen <?= $_SESSION['userName']; ?></h1>
    <div class="cards">
        <?php foreach ($Post as $index => $postOnDb): ?>
            <?php
            $date = date('d.m.Y', strtotime($postOnDb["time"]));
            $fileName = "Beitrag_" . $date;
            ?>
            <div id="card<?= $index ?>" class="card">
                <div class="card-header">
                    <p>Am <?= $date ?></p>
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
                <div class="card-footer">
                    <button onclick="downloadPostcard('card<?= $index ?>', '<?= $fileName ?>')">Herunterladen</button>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script src="js/post.js"></script>