<?php

// Checking if signup input fields are empty
function emptyInputSignup($name, $username, $email, $password, $passwordRepeat)
{
  $result;

  if (empty($name) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Checking for a valid username
function invalidUid($username)
{
  $result;

  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Checking for a valid email format
function invalidEmail($email)
{
  $result;

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Checking if password and repeated password match
function passwordMatch($password, $passwordRepeat)
{
  $result;

  if ($password !== $passwordRepeat) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Checking if username or email already exists in database
function uidExists($conn, $username, $email)
{
  $sql = "SELECT * FROM users WHERE usersUid = ? OR email = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  };

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

// Checking for password strength
function invalidPassStrength($password)
{
  $result;
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);

  if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    $result = true;
  } else {
    echo 'Strong password.';
    $result = false;
  }
  return $result;
}

function createUser($conn, $name, $username, $email, $password)
{
  $sql = "INSERT INTO users (username, email, usersUid, password) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  };

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}

// Checking if login input fields are empty
function emptyInputLogin($username, $password)
{
  $result;

  if (empty($username) || empty($password)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $password)
{
  $uidExists = uidExists($conn, $username, $username);

  if ($uidExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $hashedPassword = $uidExists["password"];
  $checkPassword = password_verify($password, $hashedPassword);

  if ($checkPassword === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  } else if ($checkPassword === true) {
    session_start();
    $_SESSION["userid"] = $uidExists["userId"];
    $_SESSION["useruid"] = $uidExists["usersUid"];
    header("location: ../index.php");
    exit();
  }
}
