<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dark Market - Login</title>
	<link rel="stylesheet" type="text/css" href="sign-in.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Nunito:wght@300;500&display=swap" rel="stylesheet">
</head>
<!-- salope -->
<body>
	<div class="wrapper">
		<div class="login-form">
		<p class="header">Dark Market - Login</p>
			<div>
				<form method="POST" action="processing.php" onsubmit="return formValidation(this);">
				<input type="text" name="username" placeholder="Username" class="usr" required="required"></input>
				<input type="password" name="password" placeholder="Password" class="pass" required="required"></input>
				<span class="register">No account yet ? <a href="register.php">Register</a></span>
				<button type="submit">Login</button>
				</form>
			</div>
			<?php
				if(isset($_GET['err']) && !empty($_GET['err']))
				{
					$err = htmlspecialchars($_GET['err']);
					switch ($err) 
					{
						case 'incorrectpassword':
							?>
								<p class="wrong">Incorrect Password.</p>
							<?php
						break;
						case 'incorrectuser':
							?>
								<p class="wrong">Incorrect Username.</p>
							<?php
					break;
					}
				}
			?>
		</div>
	</div>
</body>

<script type="text/javascript">
	let username = document.querySelector("#usr");
	let password = document.querySelector("#pass");

	function formValidation(){
		if(!username.value || !password.value){
			return false;
		}
	}
</script>

</html>