<?php
include "components/navbar-authd.php";

$setsapi = new Sets($userapi->getUsername());
$sets = $setsapi->getSets();
?>
<main>
    <div class="card mt-5" style="max-width: 700px; margin: auto;">
        <h5 class="card-header border-0">Sets</h5>
        <table>
            <?php
    foreach ($sets as $set) {
        echo "<tr class='border-top'><td style='padding: 10px;padding-left:16px;padding-right:16px;font-size:1.5em;'><a href='/?viewset={$set}'>{$set}</a></td></tr>";
    }
    ?>
</table>
</div>
</main>