<?php
require "models/register_model.php";
?>
<main>
  <h1>Registrieren</h1>
  <?php if ($validate->getErrors()) { ?>
    <ul class="error-box">
      <?php
      foreach ($validate->getErrors() as $error) {
        echo "<li>$error";
      }
      ?>
    </ul>
  <?php } ?>
  <div class="register">
    <form class="row g-3" method="post" novalidate>
      <div class="col-md-6">
        <label for="firstName" class="form-label">Vorname</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required value="<?= $firstName ?>">
      </div>
      <div class="col-md-6">
        <label for="lastName" class="form-label">Nachname</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required value="<?= $lastName ?>">
      </div>
      <div class="col-6">
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" required value="<?= $email ?>">
      </div>
      <div class="col-6">
        <label for="userName" class="form-label">Benutzername</label>
        <input type="text" class="form-control" id="userName" name="userName" required value="<?= $userName ?>">
      </div>
      <div class="col-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="agb" name="agb" required>
          <label class="form-check-label" for="agb">
            Aktzeptier der Allgemeinen Geschäftsbedingungen
          </label>
        </div>
      </div>
      <div class="col-6">
        <select class="form-select" aria-label="Default select example" required id="gender" name="gender">
          <option selected>Geschlecht</option>
          <option value="1">Cis Frau</option>
          <option value="2">Cis Mann</option>
          <option value="3">Diverse</option>
        </select>
      </div>
      <div class="col-12">
        <button type="submit">Registrieren</button>
      </div>
      <p class="has-text-centered">Du hast dich bereits ein Konto?<a href="login">Login</a></p>
    </form>
  </div>
</main>