<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registering...</title>
</head>
<body>
<?php 

	function secure($arg){
		$arg = htmlspecialchars($arg);
		$arg = htmlentities($arg);
		$arg = trim($arg);
		return $arg;
	}

	if((isset($_POST['username']) && !empty($_POST['username'])) && (isset($_POST['password']) && !empty($_POST['password']))
		&& (isset($_POST['nickname']) && !empty($_POST['nickname']))){
		$username = secure($_POST['username']);
		$password = password_hash(secure($_POST['password']), PASSWORD_DEFAULT);
		$nickname = secure($_POST['nickname']);

		$pdoname = "darkcity";
		$pdocredusr = "root";
		$pdocredpass = "root";

		$db = new PDO('mysql:host=localhost;dbname='. $pdoname .';charset=utf8', $pdocredusr, $pdocredpass);

		$chk = $db->prepare("SELECT username FROM users WHERE username = :name");
		$chk->bindParam(':name', $username);
		$chk->execute();
		$result = $chk->fetch();

		if($chk->rowCount() > 0){
		  header("location:register.php?err=userexists");
		  exit();
		}

		$currency = 0;
		
		try{
				$req = $db->prepare("INSERT INTO users(username, password, nickname, currency) VALUES(:username, :password, :nickname, :currency)");
		        $req->execute(array(
		            "username" => $username, 
		            "password" => $password,
		            "nickname" => $nickname,
		            "currency" => $currency
		            ));

				header("location:register.php?err=success");
				exit();
			}catch (Exception $e){
		header("location:register.php?err=1");
		exit();
	}}

?>
</body>
</html>