<?php include "components/navbar-noauth.php"; ?>
<main>
    <?php include "components/nod.php"; ?>
    <div class="card mt-5" style="max-width: 500px; margin:auto;">
        <h5 class="card-header">Login</h5>
        <div class="card-body">

            <form method="post" action="/?login">
                <div class="mb-3">
                    <label for="usernameInput">Username</label>
                    <input type="text" class="form-control" id="usernameInput" name="usernameInput">
                </div>
                <div class="mb-3">
                    <label for="passwordInput">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="passwordInput">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
            <div class="form-text">
                Dont have an account? <a href="/?registerpage">Register here</a>.
            </div>
        </div>
    </div>
</main>