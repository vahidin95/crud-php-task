<!-- Registration form -->

<div class="form-wrap">
  <form action="../includes/registration.php" method="post">

    <h1 class="login">Sign in</h1>

    <div class="error"> <!-- Display error validate messages--> </div>
    <?php
      include('includes/check.php');
     ?>

    <input class="login_input name" type="text" name="name" value="<?php if(isset($_GET["name"])) echo $_GET["name"]; ?>" placeholder="Your name">
    <input class="login_input email" type="text" name="email" value="<?php if(isset($_GET["email"]))echo $_GET["email"]; ?>" placeholder="Your email">
    <input type="hidden" name="type" placeholder="Your email">
    <input class="login_input pwd" type="password" name="pwd" value="<?php if(isset($_GET["pwd"]))echo $_GET["pwd"]; ?>" placeholder="Your password">

    <input class="button" onclick="validate()" type="submit" name="submit" value="Sign in">

    <div class="box">
      <p>Already registred ?</p><a class="link" href="home.php">Log in</a>
    </div>

  </form>
</div>
