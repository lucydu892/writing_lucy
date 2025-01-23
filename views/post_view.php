<?php
    require 'views/header_view.php';
    require 'models/post_model.php';
    $userLogedIn = isset($_SESSION['userId']);
    
?>
<h1>Wilkommen <?= $userLogedIn; ?></h1>
<div class="card">
    <?php foreach ($post as $postOnDb) : ?> 
        <div class="card-header">
            <p><?php htmlspecialchars($postOnDb["time"])?></p>
        </div>
        <div class="card-body">
            <p><?= htmlspecialchars($postOnDb["text"]) ?></hp>
            <?php if (($postOnDb ['image']) !== '') { ?>
            <img src="<?= htmlspecialchars($postOnDb["image"]) ?>" class="card-img-top" alt="post">
            <?php } else {?>
            <img src="images\defaultpicture.png" alt="default Picture" class="card-img-top" alt="post" style="width: 45%; height:auto;" >
            <?php } ?>
        </div>
    <?php endforeach; ?>
</div>
