<?php
$page_title = null;
$page_title = 'User Registration';
require_once('header.php'); ?>

<main class="container">
	<h1>User Registration</h1>

	<form method="post" action="../model/save-register.php">
		<fieldset class="form-group">
			<label for="user_name">Username:</label>
			<input name="user_name" required type="text" />
		</fieldset>

		<fieldset class="form-group">
			<label for="user_email">Email:</label>
			<input name="user_email" required type="email" />
		</fieldset>

		<fieldset class="form-group">
			<label for="password">Password:</label>
			<input name="password" required type="password" />
		</fieldset>

		<fieldset class="form-group">
			<label for="confirm">Confirm Password:</label>
			<input name="confirm" required type="password" />
		</fieldset>

		<button type="submit">Sign Up</button>
	</form>
</main>

<?php require_once('footer.php'); ?>
