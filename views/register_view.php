<?php
    require 'views/header_view.php';
?>
<h1>Registrieren</h1>
<form class="row g-3" novalidate>
  <div class="col-md-6">
    <label for="firstName" class="form-label">Vorname</label>
    <input type="email" class="form-control" id="firstName">
  </div>
  <div class="col-md-6">
    <label for="lastName" class="form-label">Nachname</label>
    <input type="password" class="form-control" id="lastName">
  </div>
  <div class="col-6">
    <label for="userName" class="form-label">Benutzername</label>
    <input type="text" class="form-control" id="userName">
  </div>
  <div class="col-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="agb">
      <label class="form-check-label" for="agb">
        Aktzeptier der Allgemeinen Geschäftsbedingungen
      </label>
    </div>
  </div>
  <div class="col-6">
      <select class="form-select" aria-label="Default select example">
        <option selected>Geschlecht</option>
        <option value="1">Cis Frau</option>
        <option value="2">Cis Mann</option>
        <option value="3">Diverse</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Registrieren</button>
  </div>
</form>