<?php
	session_start();
?>

<!DOCTYPE html>
<head>
<title> Omni - Membership System </title>
</head>
<body>

<?php

	if (isset($_POST["login"])){
		$usernameOrEmail = $_POST["usernameOrEmail"];
		$password = $_POST["password"];
		$con = mysqli_connect("localhost","root","root","omni");
		if (mysqli_connect_errno()){
			echo "Failed to connect to database";
		} else {
			$sql = "SELECT * FROM users WHERE username='$usernameOrEmail' OR email='$usernameOrEmail'";
			$result = $con->query($sql);
			if ($result->num_rows > 0){
				while ($row = $result->fetch_assoc()){
					if (password_verify($password,$row["password"])){
						$_SESSION["loggedIn"] = 1;
						$_SESSION["id"] = $row["id"];
						$_SESSION["username"] = $row["username"];
						$_SESSION["email"] = $row["email"];
						echo "<script>window.location.href='profile.php';</script>";
					} else {
						echo "Incorrect login information!";
					}
				}
			} else {
				echo "Incorrect login information!";
			}
		}
	}
	
?>

<form action = "" method = "post">
<input type = "text" name = "usernameOrEmail" placeholder = "Username or Email"> <br>
<input type = "password" name = "password" placeholder = "Password"> <br>
<input type = "submit" value = "Log In" name = "login"> <br>
</form>

<p> Don't have an account? <a href = "index.php">Sign Up</a> </p>

</body>
</html>