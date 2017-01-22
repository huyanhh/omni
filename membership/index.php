<?php
	session_start();
?>

<!DOCTYPE html>
<head>
<title> Omni - Membership System </title>
</head>
<body>

<?php

	if (isset($_POST["register"])){
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$confirmPassword = $_POST["confirmPassword"];

		if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)){
			echo "Please fill out all fields!";
		} else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo "Invalid email address!";
		} else if (strcmp($password,$confirmPassword) != 0){
			echo "Passwords do not match!";
		} else {
			$password = password_hash($password,PASSWORD_DEFAULT);
			$con = mysqli_connect("localhost","root","root","omni");
			if (mysqli_connect_errno()){
				echo "Failed to connect to database";
			} else {
				$sql = "INSERT INTO users (username, email, password) VALUES('$username','$email','$password')";
				if ($con->query($sql)){
					$sql = "SELECT id FROM users WHERE username='$username'";
					$result = $con->query($sql);
					if ($result->num_rows > 0){
						while ($row = $result->fetch_assoc()){
							$_SESSION["loggedIn"] = 1;
							$_SESSION["id"] = $row["id"];
							$_SESSION["username"] = $username;
							$_SESSION["email"] = $email;
						}
					}
					echo "<script>window.location.href='profile.php';</script>";
				}
			}
		}
	}

?>

<form action = "" method = "post">
<input type = "text" name = "username" placeholder = "Username"> <br>
<input type = "email" name = "email" placeholder = "Email"> <br>
<input type = "password" name = "password" placeholder = "Password"> <br>
<input type = "password" name = "confirmPassword" placeholder="Confirm Password"> <br>
<input type = "submit" value = "Sign Up" name = "register"> <br>
</form>

<p> Already have an account? <a href = "login.php">Log In</a> </p>


<?php

if (isset($_POST["submit"])){
	echo "Hello!!!!";
}

?>

<form action = "" method = "post">
<input type = "submit" value = "submit" name = "submit">
</form>




</body>
</html>