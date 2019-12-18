<?php session_start(); include("includes/dbh.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Basic crud with pure php</title>
  </head>
  <body>
    <?php
    if (!isset($_SESSION["u_id"])) {
      include("partials/login.php");
    }else {
      include("partials/nav.php");?>
      <div class="wraper">
        <!-- Add licence form -->

        <div class="add-licence">
          <form action="includes/add.php" method="get">

            <h1 class="login naslov">Add new listence</h1>

            <div class="error"> <!-- Display error validate messages--> </div>
            <?php
              include('includes/check.php');
             ?>

            <input class="login_input licence" type="text" name="name" value="<?php if(isset($_GET["name"])) echo $_GET["name"]; ?>" placeholder="Your name">
            <input class="login_input licence" type="text" name="type" value="<?php if(isset($_GET["type"]))echo $_GET["type"]; ?>" placeholder="type">
            <input class="login_input licence" type="text" name="period" value="<?php if(isset($_GET["period"]))echo $_GET["period"]; ?>" placeholder="period">
            <input class="login_input licence" type="text" name="creator" value="<?php if(isset($_GET["creator"]))echo $_GET["creator"]; ?>" placeholder="creator">

            <input class="button licence" style="color:#fff;" type="submit" name="submit" value="Add new ">

          </form>
        </div>

            <table id="customers">
              <h1 class="naslov">List of all licenses</h1>
              <form class="" action="" method="get">
                <div class="search">
                    <input type="text" class="login_input" id="search" name="search" placeholder="search table">
                    <input class="button licence" type="submit" name="trazi" required>
                </div>
              </form>

              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Period</th>
                <th>Creator</th>
                <th style="width:300px;">Action</th>
              </tr>
              <?php
              if (isset($_GET["trazi"])) {
                $search = $_GET["search"];
                $query = "SELECT * FROM `licenses` WHERE CONCAT(`id`, `name`, `type`, `period`, `creator`) LIKE '%".$search."%'";
                $pretraga = mysqli_query($conn, $query);

                while ($pret = mysqli_fetch_assoc($pretraga)):?>
                <tr>
                  <td><?=$pret["id"]?></td>
                  <td><?=$pret["name"]?></td>
                  <td><?=$pret["type"]?></td>
                  <td><?=$pret["period"]?></td>
                  <td><?=$pret["creator"]?></td>
                  <td id="action"> <a href="edit.php?id=<?=$pret["id"]?>" class="button licence" style="color:#fff;" type="submit" name="submit">Edit</a>
                  <a href="includes/delete.php?id=<?=$pret["id"]?>" class="button licence" style="color:#fff;" type="submit" name="submit">Delete</a></td>
                </tr>
              <?php endwhile;
            }else{
              $sql = "SELECT * FROM licenses";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($result);
              if($rows > 0){
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["type"]?></td>
                    <td><?=$row["period"]?></td>
                    <td><?=$row["creator"]?></td>
                    <td id="action"> <a href="edit.php?id=<?=$row["id"]?>" class="button licence" style="color:#fff;" type="submit" name="submit">Edit</a>
                    <a href="includes/delete.php?id=<?=$row["id"]?>" class="button licence" style="color:#fff;" type="submit" name="submit">Delete</a></td>
                  </tr>
                <?php
              }
             }elseif($rows < 0){
              echo "<tr>
                <th style='text-align:center;' colspan='6'>There is no licences here go to add button and go ahead!</th>
              </tr>";
            }
          }
        }
            ?>
            </table>
      </div>
  </body>
</html>
