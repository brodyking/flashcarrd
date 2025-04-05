<?php
include "components/navbar-authd.php";

$setsapi = new Sets($userapi->getUsername());
$sets = $setsapi->getSets();
?>
<main>
    <h1 class="pt-5 fw-semibold text-center" style="margin-top:50px;font-size:32pt;">
        Flashcard Sets
    </h1>
    <div class="container p-3 text-center">
        <a class="btn btn-lg btn-success text-center" href="/?createset">Create New Set</a>
    </div>
    <div class="card mt-5" style="max-width: 700px; margin: auto;">
        <h5 class="card-header border-0">Sets</h5>
        <table>
            <?php
            foreach ($sets as $set) {
                echo "<tr class='border-top'>
                <td style='padding: 10px;padding-left:16px;padding-right:16px;font-size:1.5em;'>
                <a style='inline-block; float:left;' href='/?viewset={$set}'>{$set}</a>
                    <form style='inline-block;float:right;' action='?deleteset' method='post'>
                    <input style='display:none' name='setNameInput' value='{$set}'>
                    <input style='display:none' name='usernameInput' value='{$userapi->getUsername()}'>
                    <a href='?viewset={$set}' class='btn btn-success'><i class='bi bi-book-fill'></i></a>
                    <button type='submit' class='btn btn-danger'><i class='bi bi-trash3-fill'></i></button>
                    </form>
                </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</main>