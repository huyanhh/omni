<?php
	session_start();

	if ($_SESSION["loggedIn"] != 1){
		header("location:index.php");
	}

?>

<!DOCTYPE html>
<head>
<title> Omni - Membership System </title>
</head>
<body>

<?php

	echo "Profile ";
	echo "<a href = 'logout.php'>Logout</a>";

?>

</body>
</html>