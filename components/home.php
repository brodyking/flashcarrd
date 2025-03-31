<?php
include "components/navbar-authd.php";
?>
<main>
    <h1 class="pt-5 fw-semibold text-center" style="margin-top:50px;font-size:32pt;">Welcome back <span class="text-success"><?php echo $userapi->getUsername(); ?>!</span></h1>
</main>