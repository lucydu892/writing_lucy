<?php
require "models/login_model.php";
?>

<h1>Login</h1>
<?php if ($errors) { ?>
  <ul class="error-box">
    <?php
    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
    ?>
  </ul>
<?php } ?>
<form method="post" novalidate>
  <div>
    <label for="userName">Benutzername</label>
    <input type="text" id="userName" name="userName">
  </div>
  <div>
    <label for="password">Passwort</label>
    <input type="password" id="password" name="password">
  </div>
  <button type="submit">Login</button>
</form>