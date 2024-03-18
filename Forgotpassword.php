<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>swift</title>

    <link rel="stylesheet" href="./styles1.css" />
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
        <form action="send-password-reset.php" method="post">
        <div class="work">
          <h1>Forgot Password</h1>
          <img src="./img/modit.jfif" alt="">
        </div>
        <br><br>
        <p>Enter your email to reset your password.</p>
          <div class="input-box shadow-s">
            <input type="email" name="email" id="email" / placeholder="Enter your email" >
            <i class='bx bxs-envelope' ></i>
            <em class="st">(required)</em>
            <label for="email"></label>
          </div>
          <button>Reset</button><br />
          <div class="other">
            <div class=".text-start">
              <a
                href="./login.php"
                target="_blank"
                >I can remember my password</a
              >
            </div>
            <div class=".text-end"><a href="./login.php"
              target="_blank">Login</a></div>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>
