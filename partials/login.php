<!-- Login form -->

<div class="form-wrap">
  <form action="includes/login.php" method="post">

    <h1 class="login">Log in</h1>

    <input class="login_input" type="text" name="email" placeholder="Your email">
    <input type="hidden" name="type">
    <input class="login_input" type="password" name="pwd" placeholder="Your password">

    <input class="button" type="submit" name="login" value="Log in">
    <div class="box">
      <p>Don't have account?</p><a class="link" href="index.php">Register</a>
    </div>

  </form>
</div>
