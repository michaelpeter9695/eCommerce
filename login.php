<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
 $mysqli = require __DIR__ . "/database.php";
    
  $sql = sprintf("SELECT * FROM user
                   WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
  $result = $mysqli->query($sql);
    
  $user = $result->fetch_assoc();

  if ($user) {
    if (password_verify($_POST["password"], $user["password_hash"])){
     session_start();

     $_SESSION["user_id"] = $user["id"];

     header("Location: shop.html");
     exit;
    }
  }
  $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>swift</title>

    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./responsive.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/1af3d7e4a4.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <div class="work">
        <h1>Sign In</h1>
        <img src="./img/modit.jfif" alt="" />
      </div>
      <br /><br />
      <p>Login your account to access our service.</p>

      <?php if ($is_invalid): ?>
        <em style="color: #FF0000;">Invalid login </em>
      <?php endif; ?>

      <form method="post">
       
        <div class="input-box shadow-s">
          <input type="text" / placeholder="Enter your username" name="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
          <i class="bx bxs-user"></i>
          <label for="username"></label>
        </div>
        <div class="input-box shadow-s">
          <input type="password" / placeholder="Enter your password" name="password">
          <i class="bx bxs-key"></i>
          <label for="password"> </label>
        </div>
        <button type="submit" name="">Login</button><br />
        <div class="other">
          <div class=".text-start">
            <a href="./Forgotpassword.php" target="_blank">Forger password?</a>
          </div>
          <div class=".text-end">
            <a href="./Signup.html" target="_blank">Create Account</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>


