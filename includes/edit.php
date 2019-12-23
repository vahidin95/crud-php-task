<?php

if (isset($_GET['submit'])) {
  include_once("dbh.php");
  include("functions.php");

  $id = $_GET['id'];
  $name = "'" . test_input($_GET['name']) ."'";
  $type = "'".$_GET['type']."'";
  $period =test_input($_GET['period']);
  $creator = "'".test_input($_GET['creator'])."'";

//Very basic validation using php
  if (empty($name) || empty($type) || empty($period) || empty($creator)) {
  	header("Location: ../home.php?editlicence=empty&id=$id&name=$name&type=$type&period=$period&creator=$creator");
  	exit();
  }elseif (!preg_match("/^[a-zA-Z ]*$/",($name))) {
		header("Location: ../home.php?editlicence=char&id=$id&name=$name&type=$type&period=$period&creator=$creator");
		exit();
	}elseif (!is_numeric($period)) {
    header("Location: ../home.php?editlicence=number&id=$id&name=$name&type=$type&period=$period&creator=$creator");
  	exit();
  }else {
    //Update data!
    $update = ("UPDATE licenses set name=$name, type=$type, period=$period, creator=$creator WHERE id=$id");
    $updated = mysqli_query($conn, $update);
    //die(var_dump($updated));
    if (!$updated) {
      header("Location: ../home.php?update=error");
    }else {
      header("Location: ../home.php?update=success");
    }
  }

}
