<?php
include_once('dbh.php');

$id = $_GET['id'];
//die(var_dump($id));
$query = "DELETE FROM licenses WHERE id=$id;";

if (mysqli_query($conn, $query)) {
  header('Location: ../home.php?delete=success');
}else {
  header('Location: ../home.php?delete=error');
}
