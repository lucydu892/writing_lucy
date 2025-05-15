<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/writing_lucy/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Writing Lucy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="javascript" href="js/home.js">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/settings.css">
</head>

<body>

    <?php
    session_start();
    ?>
    <header>
        <?php
        require "views/header_view.php";
        ?>
    </header>
    <main>
    <?php
            require "routes.php";
        ?>
    </main>
    <footer>
        <?php
        require "views/footer_view.php";
        ?>
    </footer>
</body>

</html>