<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <title>Intro</title>
</head>

<body>

  <nav class="px-3 navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <!-- <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button> -->
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="discover.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blogs</a>
          </li>

          <?php
          if (isset($_SESSION["useruid"])) {
            echo "<li class='nav-item'>
            <a class='nav-link' href='profile.php'>Profile</a>
          </li>";
            echo "<li class='nav-item navbar-right'>
            <a class='nav-link' href='includes/logout.inc.php'>Log out</a>
          </li>";
          } else {
            echo "<li class='nav-item'>
          <a class='nav-link' href='signup.php'>Sign up</a>
        </li>";
            echo "<li class='nav-item'>
          <a class='nav-link' href='login.php'>Login</a>
        </li>";
          }
          ?>
        </ul>

        <?php
        if (isset($_SESSION["useruid"])) {
          echo "<ul class='nav navbar-nav navbar-right'>
              <li><span>Welcome back, " . $_SESSION["useruid"] . "!</span></li></ul>";
        }
        ?>
      </div>
    </div>
  </nav>