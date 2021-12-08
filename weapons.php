<!DOCTYPE html>
<?php
	session_start();

	if(isset($_SESSION['nickname']) && !empty($_SESSION['nickname'])){
		
	}else{
		header("location:index.php");
		exit();
	}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="weapons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Nunito:wght@300;500&display=swap" rel="stylesheet">
	<title>Dark Market - Weapons</title>
</head>
<body>
    <nav>
		<ul class="menu">
			<li><a class="links">Account</a></li>
			<li><a class="log-out">Log out</a></li>
		</ul>
	</nav>
    <form action="" class="search-box">
		<input placeholder="Search" type="text" class="search-input">
	</form>
    <div class="filters-wrapper">
        <button class="filter-ar">AR</button>
        <button class="filter-smg">SMG</button>
        <button class="filter-pistol">Pistol</button>
        <button class="filter-tool">Tool</button>
        <button class="filter-clear">Clear</button>
    </div>
    <div class="wrapper">
        <div class="grid-layout">
            <!-- <div class="ar"><div class="band"><p>M4A1 - 500$</p></div></div> -->
            <?php
                function secure($arg){
                    $arg = htmlspecialchars($arg);
                    $arg = htmlentities($arg);
                    $arg = trim($arg);
                    return $arg;
                }

                $pdoname = "darkcity";
                $pdocredusr = "root";
                $pdocredpass = "root";

                try{
                    $db = new PDO('mysql:host=localhost;dbname='. $pdoname .';charset=utf8', $pdocredusr, $pdocredpass);
                    if(isset($_GET['weapontype']) && !empty($_GET['weapontype'])){
                        $weapontype = htmlspecialchars(secure($_GET['weapontype']));
                        $sqlQuery = 'SELECT * FROM market WHERE itemtype="weapon" AND class="'. $weapontype .'"';
                    }else{
                        $sqlQuery = 'SELECT * FROM market WHERE itemtype="weapon"';
                    }
                   
                    foreach  ($db->query($sqlQuery) as $row) 
                    {
                        echo '<div class="'. $row['class'] . '" style="background-image:url(images/weapons/'. $row['image'] .');"><div class="band"><p>' . $row['name'] . ' - '. $row['price'] .'$</p></div></div>';
                    }
                }
                catch (Exception $e){
                        header("location:home.php?err=dberror");
                        exit();
                }
            ?>
        </div>
    </div>
</body>
</html>