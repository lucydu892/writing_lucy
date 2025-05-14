<?php
require "models/login_model.php";
?>

<main>
  <?php
  if (strpos($_SERVER['REQUEST_URI'], 'login') !== false): ?>
    <link rel="stylesheet" href="css/login-register.css">
  <?php endif; ?>
  <h1>Login</h1>
  <br>
  <?php if ($errors) { ?>
    <ul class="error-box">
      <?php
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      ?>
    </ul>
  <?php } ?>
  <div class="login-form">
    <form class="row g-3" method="post" novalidate>
      <div class="col-12">
        <label for="userName" class="form-label">Benutzername</label>
        <input type="text" id="userName" name="userName" class="form-control" required>
      </div>
      <div class="col-12">
        <label for="password" class="form-label">Passwort</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div class="col-12">
      <p class="has-text-centered">Du hast noch kein Konto? <a href="register">Registrieren</a></p>
      <button type="submit">Login</button>
    </form>
</main>