<?php include_once "header.php"; ?>

<section class="p-5 mb-3 bg-dark text-light justify content-center">
  <h1 class="mb-3">Sign-up</h1>
  <form class="justify-content-center" action="includes/signup.inc.php" method="post">
    <div class="mb-3">
      <input type="text" name="name" placeholder="Full Name">
    </div>
    <div class="mb-3">
      <input type="email" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
      <input type="text" name="username" placeholder="Username">
    </div>
    <div class="mb-3">
      <input type="password" name="password" placeholder="Password">
    </div>
    <div class="mb-3">
      <input type="password" name="passwordRepeat" placeholder="Repeat password">
    </div>
    <button type=" submit" name="submit">Submit</button>
  </form>
  <div>
    <?php

    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields</p>";
      } else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username</p>";
      } else if ($_GET["error"] == "invalidemail") {
        echo "<p>Invalid email!</p>";
      } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Your passwords don't match</p>";
      } else if ($_GET["error"] == "usernametaken") {
        echo "<p>This username is already taken.</p>";
      } else if ($_GET["error"] == "invalidpassword") {
        echo "<p>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>";
      } else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong, try again!</p>";
      } else {
        echo "<p>You have signed up successfully!</p>";
      }
    }
    ?>
  </div>
</section>

<?php include_once "footer.php"; ?>