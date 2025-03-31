<?php include "components/navbar-noauth.php"; ?>
<main>
  <div class="card mt-5" style="max-width: 500px; margin:auto;">
    <h5 class="card-header">Register</h5> 
    <div class="card-body">
      <form method="post" action="/?register">
        <div class="mb-3">
          <label for="emailInput">Email</label>
          <input type="email" class="form-control" id="emailInput" name="emailInput">
        </div>
        <div class="mb-3">
          <label for="usernameInput">Username</label>
          <input type="text" class="form-control" id="usernameInput" name="usernameInput">
        </div>
        <div class="mb-3">
          <label for="passwordInput">Password</label>
          <input type="password" class="form-control" id="passwordInput" name="passwordInput">
        </div>
        <button type="submit" class="btn btn-success">Create Account</button>
      </form>
      <div class="form-text">
        Have an account? <a href="/?loginpage">Login here</a>.
      </div>
    </div>
  </div>
</main>