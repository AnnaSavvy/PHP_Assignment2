<?php
  require './inc/header.php';
?>
  <main class="signup">
    <section>
        <h2>It Looks Like You Are Not Signed In!</h2>
          <form method="post" action="./inc/validate.php">
          <div class="container">
              <h2>Sign In</h2>
              <p>Sign in below</p>
              <hr>

              <label for="username"><b>Username</b></label>
              <input class="form-control" name="username" type="text" placeholder="Username" required/>
              <label for="password"><b>Password</b></label>
              <input class="form-control" name="password" type="password" placeholder="Password" required/>
              <input class="submit" type="submit" value="Sign In" />
              <div>
                  <p><a class="button" href="signup.php"">Don't have an account? Sign Up here!</a></p>
              </div>
        </form>
    </section>
  </main>
<?php
  require './inc/footer.php';
?>
