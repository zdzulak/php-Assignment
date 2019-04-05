<?php
$page_title = null;
$page_title = 'Login';
require_once('header.php'); ?>

<main class="container">
	<h1>Log In</h1>
	<form method="post" action="../model/validate.php">
		<fieldset class="form-group">
			<label for="user_email">Email:</label>
			<input name="user_email" required type="email" />
		</fieldset>
		<fieldset class="form-group">
			<label for="password">Password:</label>
			<input name="password" required type="password" />
		</fieldset>
		<button type="submit">Log In</button>
	</form>
</main>

<?php require_once('footer.php'); ?>
