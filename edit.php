<?php
session_start();
include("includes/dbh.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Basic crud with pure php</title>
  </head>
  <body>
    <div class="container">
      <?php
      if (!isset($_SESSION["u_id"])) {
        include("partials/login.php");
      }else {
        include("partials/nav.php");
        $id = $_GET['id'];
        //die(var_dump($id));
        $query = "SELECT * FROM licenses WHERE id=$id" ;
        $result = mysqli_query($conn, $query);
        $licence = mysqli_fetch_assoc($result);
        ?>
        <div class="wraper">
          <!-- Add licence form -->

          <div class="add-licence">
            <form action="includes/edit.php" method="GET">

              <h1 class="login naslov">Edit listence with name <?= $licence['name']; ?></h1>

              <div class="error"> <!-- Display error validate messages with javascript--> </div>
              <?php
                include('includes/check.php');
               ?>

              <input class="login_input licence" type="text" name="name" value="<?= $licence["name"]; ?>" placeholder="name">
              <input  type="hidden" name="id" value="<?= $id ?>" >

              <select class="login_input licence" name="type" style="color: #757575;">
                <option class="login_input licence">Select</option>
                <option value="Montly" <?php if($licence['type'] == "Montly") echo 'selected="selected"';?>>Montly</option>
                <option value="Yearly" <?php if($licence['type'] == "Yearly") echo 'selected="selected"';?>>Yearly</option>
              </select>
              <input class="login_input licence" type="text" name="period" value="<?=  $licence["period"]; ?>" placeholder="period">
              <input class="login_input licence" type="text" name="creator" value="<?=  $licence["creator"]; ?>" placeholder="creator">

              <input class="button licence" style="color:#fff;" type="submit" name="submit" value="Update">

            </form>
          </div>
        </div>
      <?php
       } ?>
    </div>
  </body>
</html>
