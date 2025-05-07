<header>
    <nav class="navbar navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">Writing Lucy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php if (isset($_SESSION['userId'])) { ?>
                        <a class="nav-link active" aria-current="page" href="post">Meine Beiträge</a>
                        <a class="nav-link active" aria-current="page" href="logout">Abmelden</a>
                        <!-- <a class="nav-link active" aria-current="page" href="settings">Einstellung</a> -->
                    <?php } else { ?>
                        <a class="nav-link active" aria-current="page" href="register">Registrieren</a>
                        <a class="nav-link active" aria-current="page" href="login">Anmelden</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
</header>