<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Logging in...</title>
</head>
<body>
	<?php
		function secure($arg){
			$arg = htmlspecialchars($arg);
			$arg = htmlentities($arg);
			$arg = trim($arg);
			return $arg;
		}

		if((isset($_POST['username']) && !empty($_POST['username'])) && (isset($_POST['password']) && !empty($_POST['password'])))
		{
			$username = secure($_POST['username']);
			$password = secure($_POST['password']);

			$pdoname = "darkcity";
			$pdocredusr = "root";
			$pdocredpass = "root";

			$con=mysqli_connect("localhost",$pdocredusr,$pdocredpass,"users");
			if (mysqli_connect_errno()){header("location:index.php?err=2");}

			try{
				$db = new PDO('mysql:host=localhost;dbname='. $pdoname .';charset=utf8', $pdocredusr, $pdocredpass);
				$sqlQuery = 'SELECT * FROM users WHERE username="'. $username .'"';

				if(mysql_num_rows($sqlQuery)==0){header("location:index.php?err=incorrectuser");}

				foreach  ($db->query($sqlQuery) as $row) {
					if(password_verify($password,$row['password'])){
						session_start();
						$_SESSION['nickname'] = $row['nickname'];
						$_SESSION['username'] = $row['username'];
						header("location:home.php");
					}else{
						header("location:index.php?err=incorrectpassword");
					}
				}
			}
			catch (Exception $e){
			        header("location:index.php?err=2");
			}
		}
		else
		{
			header("location:index.php?err=1");
		}
	?>
</body>
</html>