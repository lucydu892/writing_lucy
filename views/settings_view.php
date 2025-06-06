<?php
require 'models/settings_model.php';
$userLogedIn = isset($_SESSION['userId']);
?>
<main class="settings-main">
	<?php
	if (strpos($_SERVER['REQUEST_URI'], 'settings') !== false): ?>
		<link rel="stylesheet" href="css/settings.css">
	<?php endif; ?>
	<header>
		<h1>Profile Settings</h1>
	</header>
	<form method="post" novalidate>

		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					<div class="card h-100">
						<div class="card-profile">
							<div class="account-settings">
								<div class="user-profile">
									<div class="user-avatar">
										<img src="images\profileImgDefault.jpeg" alt="Default Picture">
									</div>
									<h5 class="userName"><?= $_SESSION['userName'] ?></h5>
									<h6 class="email"><?= $_SESSION['email'] ?></h6>
								</div>
								<div class="about">
									<h5>About</h5>
									<p>Welcome to your profile settings page. Here you can update your personal details and address.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					<div class="card h-100">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-3 text-primary">Personal Details</h6>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="firstName">Vorname</label>
										<input type="text" class="form-control" name="firstName" placeholder="<?= $User->getFirstName() ?>" value="<?= $User->getFirstName() ?>">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="lastName">Nachname</label>
										<input type="text" class="form-control" name="lastName" placeholder="<?= $User->getLastName() ?>" value="<?= $User->getLastName() ?>">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" placeholder="<?= $User->getEmail() ?>" value="<?= $User->getEmail() ?>">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="phone">Handy</label>
										<input type="text" class="form-control" name="phone" placeholder="076 000 00 00" value="<?= $User->getPhone() ?>">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="website">Webseite URL</label>
										<input type="url" class="form-control" name="website" placeholder="funnywebsite.com" value="<?= $User->getWebsite() ?>">
									</div>
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="text-right">
										<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
									</div>
								</div>
							</div>
							<div class="password-section">
								<h6 class="mb-3 text-primary">Change Password</h6>
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="password">Passwort</label>
													<input type="password" class="form-control" name="password" placeholder="">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	</form>
</main>
<script src="js/settings.js"></script>