<?php
session_start();
if (isset($_POST['login'])) {
	include_once("dbh.php");

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if (empty($email) || empty($pwd)) {
		header("Location: ../home.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_email='$email' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck < 1) {
			header("Location: ../home.php?login=error1");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)){
				$dehechpwd = password_verify($pwd, $row['user_pwd']);

				if ($dehechpwd == false) {
					header("Location: ../home.php?login=error2");
					exit();
				}elseif ($dehechpwd == true) {
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_name'] = $row['user_name'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_pwd'] = $row['user_pwd'];

					header("Location: ../home.php?login=success");
					exit();
				}
			}
		}
	}




}else{
	header("Location: ../home.php?login=error3");
}

// mysqli_fetch_assoc = convert db in array();
