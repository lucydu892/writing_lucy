<?php
    require 'views/header_view.php';
    require 'models/login_model.php';
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
<div class="container">
  <form class="row g-3 needs-validation" method="post" novalidate>

    <div class="col-5">
    <div class="row mb-3">
      <label for="userName" class="col-sm-2 col-form-label">Benutzername</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="userName" name="userName">
      </div>
    </div>
    <div class="row mb-3">
      <label for="password" class="col-sm-2 col-form-label">Passwort</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password">
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Login</button>
    </div>
  </form>
</div>  
 