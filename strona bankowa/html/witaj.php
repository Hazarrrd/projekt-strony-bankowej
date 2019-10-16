<?php
	session_start();
	
	if(!isset($_SESSION['registered'])) {
		header('Location: index.php');
		exit();
	}
	else {
		unset($_SESSION['registered']);
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrom=1"/>
	<title>rockyBank wita nowego klienta</title>
	
	<style>
	
	body {
		text-align: center;
		background-color: #342323;
		color: white;
	}
	
	a {
		color: #993;
		text-decoration: none;
		text-decoration: underline;
	}
	
	a:hover {
		color: white;
	}
	
	
	</style>
</head>

<body>

	<h1>"Dziękujemy za rejestracje. Możesz już przejść do swojego konta. Na emailu pojawi się potwierdzenie utworzenia konta.</h1><br/>
	
	<p><a href="index.php"><img class="header-left" src="images/glove.jpg"
         width="107" height="40" alt="Link do gł&#243;wnej strony rockyBank"><br/>Zaloguj się na swoje konto</a></p>

</body>
</html>
