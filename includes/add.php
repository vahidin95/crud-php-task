<?php
if (isset($_GET['submit'])) {
  include_once("dbh.php");
  include("functions.php");

  $name = test_input($_GET['name']);
  $type = $_GET['type'];
  $period = test_input($_GET['period']);
  $creator = test_input($_GET['creator']);

//Very basic validation using php
  if (empty($name) || empty($type) || empty($period) || empty($creator)) {
  	header("Location: ../home.php?licence=empty&name=$name&type=$type&period=$period&creator=$creator");
  	exit();
  }elseif (!preg_match("/^[a-zA-Z ]*$/",($name))) {
		header("Location: ../home.php?licence=char&name=$name&type=$type&period=$period&creator=$creator");
		exit();
	}elseif (!is_numeric($period)) {
    header("Location: ../home.php?licence=number&name=$name&type=$type&period=$period&creator=$creator");
  	exit();
  }else {
    //Saving data!
    $stmt = $conn->prepare("INSERT INTO licenses (name, type, period, creator)
    VALUES (?,?,?,?)");
    //die(var_dump($stmt));
    $stmt->bind_param("ssss", $name, $type ,$period, $creator);
    $stmt->execute();
    header("Location: ../home.php?licence=success");
  }

}

?>
