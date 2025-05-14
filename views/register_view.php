<?php
require "models/register_model.php";

/**
 * Gibt ein einzelnes Feld-Fehler-HTML zurück.
 * @param string $field
 * @param object $validate
 * @return string
 */
function renderFieldError($field, $validate) {
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

  <h1>Registrieren</h1>
  <div class="register">
    <form class="row g-3" method="post" novalidate>
      <div class="col-md-6">
        <label for="firstName" class="form-label">Vorname</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required value="<?= htmlspecialchars($_POST['firstName'] ?? '') ?>">
        <?= renderFieldError('firstName', $validate) ?>
      </div>
      <div class="col-md-6">
        <label for="lastName" class="form-label">Nachname</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required value="<?= htmlspecialchars($_POST['lastName'] ?? '') ?>">
        <?= renderFieldError('lastName', $validate) ?>
      </div>
      <div class="col-6">
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <?= renderFieldError('email', $validate) ?>
      </div>
      <div class="col-6">
        <label for="userName" class="form-label">Benutzername</label>
        <input type="text" class="form-control" id="userName" name="userName" required value="<?= htmlspecialchars($_POST['userName'] ?? '') ?>">
        <?= renderFieldError('userName', $validate) ?>
      </div>
      <div class="col-6">
        <label for="password" class="form-label">Password</label>
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
      <div class="col-6">
        <select class="form-select" aria-label="Default select example" required id="gender" name="gender">
          <option value="gender">Geschlecht</option>
          <option value="1" <?= (($_POST['gender'] ?? '') == '1') ? 'selected' : '' ?>>Cis Frau</option>
          <option value="2" <?= (($_POST['gender'] ?? '') == '2') ? 'selected' : '' ?>>Cis Mann</option>
          <option value="3" <?= (($_POST['gender'] ?? '') == '3') ? 'selected' : '' ?>>Diverse</option>
        </select>
        <?= renderFieldError('gender', $validate) ?>
      </div>
      <p class="has-text-centered">Du hast bereits ein Konto?<a href="login"> Login</a></p>
      <div class="col-12">
        <button type="submit">Registrieren</button>
      </div>
    </form>
  </div>
</main>