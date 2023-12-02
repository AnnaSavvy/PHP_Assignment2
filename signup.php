<?php
  require './inc/header.php';
?>
  <main class="signup">
      <section>
          <h2>Signup Form</h2>
          <form method="post" action="save-admin.php">
              <div class="container">
                  <h2>Sign Up</h2>
                  <p>Please fill in this form to create an account.</p>
                  <hr>
                  <label for="email">Email</label>
                  <input type="email" placeholder="Enter Email" name="email" required>

                  <label for="password">Password</label>
                  <input type="password" placeholder="Enter Password" name="password" required>

                  <label for="password_repeat">Repeat Password</label>
                  <input type="password" placeholder="Repeat Password" name="password_repeat" required>

                  <label for="first_name">First Name</label>
                  <input type="text" placeholder="Enter First Name" name="first_name" required>

                  <label for="last_name">Last Name</label>
                  <input type="text" placeholder="Enter Last Name" name="last_name" required>

                  <input name="submit" class="submit" type="submit" value="Sign Up" />
              </div>
          </form>
      </section>
  </main>
<?php
  require './inc/footer.php';
?>
