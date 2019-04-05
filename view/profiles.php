<?php ob_start();

// authentication check
require_once('auth.php');

// set the page title
$page_title = null;
$page_title = 'Other Users';

// embed the header
require_once('header.php');

// connect
require_once('db.php');

// write the sql query
$sql = "SELECT * FROM profiles";

// execute the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$profiles = $cmd->fetchAll();

// start the html display table
echo '<table class="table table-striped table-hover"><thead><th>Username</th><th>Location</th><th>Skills</th></thead><tbody>';

// loop through the results and show each movie in a new row and each value in a new column
foreach ($profiles as $profile) {
	echo '<tr><td>' . $profile['user_name'] . '</td>
		<td>' . $profile['location'] . '</td>
		<td>' . $profile['skills'] . '</td>';
}

// close the table and body
echo '</tbody></table>';

// disconnect
$conn = null;

// embed footer
require_once('footer.php');
ob_flush();
?>
