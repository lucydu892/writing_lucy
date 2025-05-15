<?php
require "models/login_model.php";

/**
 * Gibt ein einzelnes Feld-Fehler-HTML zurück.
 * @param string $field
 * @param object $validateLogin
 * @return string
 */

function renderFieldError($field, $validateLogin) {
    $error = $validateLogin->getFieldError($field);
    if (!empty($error)) {
        return '<div class="invalid-feedback" style="display:block;color:#dc3545;">'
            . htmlspecialchars($error) .
            '</div>';
    }
    return '';
}
?>
<main>
  <?php
  if (strpos($_SERVER['REQUEST_URI'], 'login') !== false): ?>
    <link rel="stylesheet" href="css/login-register.css">
  <?php endif; ?>

  <h1>Login</h1>
  <br>
  <div class="login-form">
    <form class="row g-3" method="post" novalidate>
      <div class="col-12">
        <label for="userName" class="form-label">Benutzername</label>
        <input type="text" id="userName" name="userName" class="form-control" required value ="<?= htmlspecialchars($_POST['userName'] ?? '') ?>">
        <?= renderFieldError('userName', $validateLogin) ?>
      </div>
      <div class="col-12">
        <label for="password" class="form-label">Passwort</label>
        <input type="password" id="password" name="password" class="form-control" required value ="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
        <?= 
        renderFieldError('password', $validateLogin),
        renderFieldError('login', $validateLogin) ?>

      </div class="col-12">
      <p class="has-text-centered">Du hast noch kein Konto? <a href="register">Registrieren</a></p>
      <button type="submit">Login</button>
    </form>
</main>