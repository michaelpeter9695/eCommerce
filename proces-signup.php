<?php
if (empty($_POST["firstname"])) {
  die("Firstname is required");
}

if (empty($_POST["lastname"])) {
  die("Lastname is not required");
}
if (empty($_POST["username"])) {
  die("Username is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  die("Valid email is required");
}
if (empty($_POST["number"])) {
  die("Number is required");
}

if (strlen($_POST["password"]) < 6) {
  die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
  die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
  die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirm"]) {
  die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user(firstname, lastname, username, email, number, password_hash)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssis",
                   $_POST["firstname"],
                   $_POST["lastname"],
                   $_POST["username"],
                   $_POST["email"],
                   $_POST["number"],
                   $password_hash);                
if ($stmt->execute()){
  header("Location: login.php");
    exit;

} else {
    
  if ($mysqli->errno === 1062) {
      die("email already taken");
  } else {
      die($mysqli->error . " " . $mysqli->errno);
  }
}






?>