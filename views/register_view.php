<?php
require "models/register_model.php";

/**
 * Gibt ein einzelnes Feld-Fehler-HTML zurück.
 * @param string $field
 * @param object $validate
 * @return string
 */
function renderFieldError($field, $validate)
{
  $error = $validate->getFieldError($field);
  if (!empty($error)) {
    return '<div class="invalid-feedback" style="display:block;color:#dc3545;">'
      . htmlspecialchars($error) .
      '</div>';
  }
  return '';
}

?>

<main>
  <?php if (strpos($_SERVER['REQUEST_URI'], 'register') !== false): ?>
    <link rel="stylesheet" href="css/login-register.css">
  <?php endif; ?>
  <div class="container" >
    <h1>Registrieren</h1>
    <br>
    <div class="register">
      <form class="row g-3" method="post" novalidate>
        <div class="col-12">
          <label for="userName" class="form-label">Benutzername</label>
          <input type="text" class="form-control" id="userName" name="userName" required value="<?= htmlspecialchars($_POST['userName'] ?? '') ?>">
          <?= renderFieldError('userName', $validate) ?>
        </div>
        <div class="col-12">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
          <?= renderFieldError('email', $validate) ?>
        </div>
        <div class="col-12">
          <label for="password" class="form-label">Passwort</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <?= renderFieldError('password', $validate) ?>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="agb" name="agb" required <?= isset($_POST['agb']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="agb">
              Aktzeptier der Allgemeinen Geschäftsbedingungen
            </label>
            <?= renderFieldError('agb', $validate) ?>
          </div>
        </div>
        <p class="has-text-centered">Du hast bereits ein Konto?<a href="login"> Login</a></p>
        <button type="submit">Registrieren</button>
      </form>
    </div>
  </div>
</main>