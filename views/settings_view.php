<?php
require 'models/settings_model.php';
$userLogedIn = isset($_SESSION['userId']);
?>
<main class="settings-main">
	<?php
	if (strpos($_SERVER['REQUEST_URI'], 'settings') !== false): ?>
		<link rel="stylesheet" href="css/settings.css">
	<?php endif; 
		$passwordUnhashed = password_verify('password', $User['password']);
	?>

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
								<h5 class="user-name"><?= $_SESSION['userName'] ?></h5>
								<h6 class="user-email"><?= $_SESSION['email'] ?></h6>
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
									<label for="fullName">Vorname</label>
									<input type="text" class="form-control" id="fullName" placeholder="<?= $User['firstName'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="fullName">Nachname</label>
									<input type="text" class="form-control" id="fullName" placeholder="<?= $User['lastName'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="eMail">Email</label>
									<input type="email" class="form-control" id="eMail" placeholder="<?= $User['email'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Handy</label>
									<input type="text" class="form-control" id="phone" placeholder="076 000 00 00">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="website">Passwort</label>
									<input type="password" class="form-control" id="password" placeholder="">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="website">Webseite URL</label>
									<input type="url" class="form-control" id="website" placeholder="funnywebsite.com">
								</div>
							</div>
						</div>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="text-right">
									<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
									<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>