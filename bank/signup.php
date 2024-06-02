<html>
  <head>
    <link rel="stylesheet" href="css/style2.css">
    <title>State Bank of India</title>
  </head>
  <body>
    <article class="container">
      <div class="card">
        <h2><center>Sign Up</center></h2>
        <form action="connect.php" method="post">
          <div id="message"></div>
          <p>
          <label for="name">name:</label>
            <input type="text" name="name" required placeholder="Enter your name">
          </p>
          <p>
          <label for="name">email:</label>
            <input type="email" name="email" required placeholder="Enter your email">
          </p>
          <p>
          <label for="password">password:</label>
            <input type="password" name="password" id="password" required placeholder="Enter your password">
          </p>
          <p>
          <label for="confirmpassword">confirmpassword:</label>
            <input type="password" name="confirmpassword" id="confirmpassword" required placeholder="Confirm your password">
          </p>
          <div class=lower>
          <button type="submit" name="submit" value="submit" id="submitBtn">SUBMIT</button>
        </div>
          <p>
            Already have an account? <a href="login.php">Login</a>
          </p>
          <p>
            Back To Home <a href="bankmanagement.php">Home</a>
          </p>
        </form>
      </div>
    </article>
    <script src="js/valid.js"></script>
  </body>
</html>
