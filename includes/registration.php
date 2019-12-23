<?php
session_start();


include_once 'functions.php';

if (isset($_POST['submit'])) {

include('dbh.php');

//$id = $_SESSION['u_email']
$name = test_input($_POST['name']) ;
$email = test_input($_POST['email']);
$pwd = test_input($_POST['pwd']);
$type = test_input($_POST['type']);


if (empty($name) || empty($email) || empty($pwd)) {
	header("Location: ../index.php?registration=empty&name=$name&email=$email");
	exit();
}else{
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		header("Location: ../index.php?registration=char&email=$email");
		exit();
	}if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../index.php?registration=email&first=$first&last=$last&uid=$uid");
		exit();
		}
  if (strlen($pwd) < 8) {
				header("Location: ../index.php?registration=pass&name=$name&email=$email");
				exit();
			}else{

					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

					//Saving data!
					$stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_type, user_pwd)
					VALUES (?,?,?,?)");
					$stmt->bind_param("ssss", $name, $type ,$email, $hashedpwd);
					$stmt->execute();

					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {

              $_SESSION['u_id'] = $row['user_id'];
    					$_SESSION['u_name'] = $row['user_name'];
    					$_SESSION['u_email'] = $row['user_email'];
              $_SESSION['u_pwd'] = $row['user_pwd'];

						}
					}else{
						die(var_dump("error!"));
					}
          //die(var_dump($_SESSION['u_id']));
					header("Location: ../home.php?registration=success");
					}
         }
				}else{
	header("Location: ../index.php");
}






?>
