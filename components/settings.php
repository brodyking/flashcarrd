<?php
include "components/navbar-authd.php";

$setsapi = new Sets($userapi->getUsername());
$sets = $setsapi->getSets();
?>
<main>

    <h1 class="pt-5 fw-semibold text-center" style="margin-top:50px;font-size:32pt;">Settings</h1>
    <div class="card mt-5" style="max-width: 700px; margin: auto;">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <form method="post" action="/?changepswd">
                <input type="text" style="display: none;" value="<?php echo $userapi->getUsername(); ?>"
                    class="form-control" id="usernameInput" name="usernameInput">
                <div class="mb-3">
                    <label for="usernameInput">Old Password</label>
                    <input type="password" class="form-control" id="oldPasswordInput" name="oldPasswordInput">
                </div>
                <div class="mb-3">
                    <label for="passwordInput">New Password</label>
                    <input type="password" class="form-control" id="newpasswordInput" name="newPasswordInput">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
    </div>
</main>