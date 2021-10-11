<?php
include("includes/config.php");

//session_destroy();

	if(isset($_SESSION['userLoggedIn']))
	{
		$userLoggedIn = $_SESSION['userLogged'];
	}
	else{
		header('Location: register.php');
	}
?>

<html>
<head>
	<title>Spotify Clone</title>
</head>

<body>
	Klik klak bang!!!
</body>

</html>