<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Super Cool Website</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

  </head>
  <body>

    <nav class="navbar">
    	<a href="menu.php" title="Assignment 2" class="navbar-brand">Assignment 2</a>

    	<ul class="nav navbar-nav">
    		<?php // show public or private links depending on whether the user has been authenticated
    		if (!empty($_SESSION['user_id'])) { ?>
    			<li><a href="../view/logout.php" title="Logout">Logout</a></li>
    		<?php
    		}
    		else { ?>
    			<li><a href="../view/register.php" title="Register">Register</a></li>
    			<li><a href="../view/login.php" title="Login">Login</a></li>
    		<?php } ?>
    	</ul>
    </nav>
