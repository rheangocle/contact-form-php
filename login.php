<?php include_once "header.php"; ?>

<section class="p-5 bg-dark text-light justify content-center">
  <h1 class="mb-3">Log In</h1>
  <form class="justify-content-center" action="includes/login.inc.php" method="post">
    <div class="mb-3">
      <input type="text" name="uid" placeholder="Username/Email">
    </div>
    <div class="mb-3">
      <input type="password" name="password" placeholder="Password">
    </div>
    <button type=" submit" name="submit">Log in</button>
  </form>

  <div>
    <?php

    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields</p>";
      } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information</p>";
      }
    }
    ?>
  </div>
</section>

<?php include_once "footer.php"; ?>