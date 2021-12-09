<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sign-in.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Nunito:wght@300;500&display=swap" rel="stylesheet">
	<title>Dark Market - Register</title>
</head>
<body>
	<div class="wrapper">
		<div class="login-form">
		<p class="header">Dark Market - Register</p>
			<div>
				<form method="POST" action="register_processing.php" onsubmit="return formValidation(this);">
				<div class="form-label">
					<label for="usr">Username</label>
					<input type="text" name="username" class="usr" required="required" onfocus="addActive(this)" onfocusout="removeActive(this)"></input>
				</div>
				<div class="form-label">
					<label for="pass">Password</label>
					<input type="password" name="password" class="pass" required="required" onfocus="addActive(this)" onfocusout="removeActive(this)"></input>
				</div>
				<div class="form-label">
					<label for="confirm-pass">Confirm password</label>
					<input type="password" name="passwordval" class="passval" required="required" onfocus="addActive(this)" onfocusout="removeActive(this)"></input>
				</div>
				<div class="form-label">
					<label for="mail">Nickname</label>
					<input type="text" name="nickname" class="nick" required="required" onfocus="addActive(this)" onfocusout="removeActive(this)"></input>
				</div>
				<span class="register">Already have an account ?<a href="index.php">Login</a></span>
				<button type="submit">Register</button>
				</form>
			</div>
<!-- LE PHP DE SES MORTS -->
<?php
	if(isset($_GET['err']) && !empty($_GET['err']))
	{
		$err = htmlspecialchars($_GET['err']);
		switch ($err) 
		{
			case 'userexists':
				?>
					<p class="wrong">Username already exists.</p>
				<?php
			break;
			case 'success':
				?>
				<p class="correct"></p>
				<script>
					let seconds = 4;
					let message = document.querySelector(".correct");

					function countdown(){
						seconds -= 1;
						message.innerText = "You'll be redirected in " + seconds + " seconds";
					} let wait = setInterval(countdown, 1000);

					setTimeout(function(){
						window.location.href = 'index.php';
					}, 4000);
				</script>
					<!-- <p class="wrong">Account successfully created. <br>You'll be redirected in</p> -->
				<?php
		break;
		}
	}
?>
<!-- LE PHP DE SES MORTS -->
		</div>
	</div>
</body>

<script type="text/javascript">
	let username = document.querySelector(".usr");
	let password = document.querySelector(".pass");
	let passwordvalidation = document.querySelector(".passval");
	let nickname = document.querySelector(".nick");

	function formValidation(){
		if(!username.value || !password.value || !passwordvalidation.value || !nickname.value){
			return false;
		}else if(password.value != passwordvalidation.value){
			alert("passwords are different");
			return false;
		}
	}

	function addActive(arg) {
		arg.parentElement.classList.add("active");
	}

	function removeActive(arg) {
		if(!arg.value) {
		arg.parentElement.classList.remove("active");
		}
	}

</script>

</html>