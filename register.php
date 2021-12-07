<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dark Market - Register</title>
	<link rel="stylesheet" type="text/css" href="sign-up.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Nunito:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<div class="login-form">
		<p class="header">Dark Market - Register</p>
			<div>
				<form autocomplete="off" method="POST" action="register_processing.php" onsubmit="return formValidation(this);">

				<label for="username">Username : </label>
				<input type="text" name="username" placeholder="Username" id="usr" required="required"></input>

				<label for="password">Password : </label>
				<input type="password" name="password" id="pass" required="required"></input>

				<label for="passwordval">Confirm password : </label>
				<input type="password" name="passwordval" id="passval" required="required"></input>

				<label for="nickname">Your nickname : </label>
				<input type="text" name="nickname" id="nick" required="required"></input>

			    <button type="submit">Register</button>
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
	let passwordvalidation = document.querySelector("#passval");
	let nickname = document.querySelector("#nick");

	function formValidation(){
		if(!username.value || !password.value || !passwordvalidation.value || !nickname.value){
			return false;
		}else if(password.value != passwordvalidation.value){
			alert("passwords aren't the same.");
			return false;
		}
	}
</script>

</html>