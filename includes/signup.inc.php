<?php

if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $passwordRepeat = $_POST["passwordRepeat"];

  require_once "dbh.inc.php";
  require_once "functions.inc.php";

  if (emptyInputSignup($name, $username, $email, $password, $passwordRepeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
    exit();
  }
  if (invalidUid($username) !== false) {
    header("location: ../signup.php?error=invaliduid");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }
  if (passwordMatch($password, $passwordRepeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
  }
  if (uidExists($conn, $username, $email) !== false) {
    header("location: ../signup.php?error=usernametaken");
    exit();
  }
  if (invalidPassStrength($password) !== false) {
    header("location: ../signup.php?error=invalidpassword");
    exit();
  }

  createUser($conn, $name, $username, $email, $password);
} else {
  header("location: ../signup.php");
  exit();
}
