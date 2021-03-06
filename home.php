<!DOCTYPE html>
<?php
	session_start();

	if(!((isset($_SESSION['nickname']) && !empty($_SESSION['nickname']))))
		header("location:index.php");
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Nunito:wght@500&display=swap" rel="stylesheet">
	<title>Dark Market - Home</title>
</head>
<body>
	<nav>
		<ul class="menu">
			<li><a href="account.php" class="links">Account</a></li>
			<li><a class="log-out" href="index.php?sess=unset">Log out</a></li>
		</ul>
	</nav>
	<form action="" class="search-box">
		<input placeholder="Search" type="text" class="search-input">
	</form>
	<div class="container">
		<div class="categories">
			<div class="weapons"><a href="weapons.php">Weapons</a></div>
			<div class="equipment"><a href="equipment.php">Equipment</a></div>
			<div class="drugs"><a href="drugs.php">Drugs</a></div>
		</div>
	</div>
</body>

</html>