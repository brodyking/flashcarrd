<?php

include "components/navbar-authd.php";
$questionsapi = new Questions($userapi->getUsername(), $_GET["viewset"]);
$questionkeys = $questionsapi->getQuestionsKeys();
$questions = $questionsapi->getQuestions();
?>
<main>
    <h1 class="pt-5 fw-semibold text-center" style="margin-top:50px;font-size:32pt;"><?php echo $questionsapi->getCurrentSet(); ?></h1>
    <div class="container p-3 text-center">
        <a class="btn btn-lg btn-success text-center" href="/?study=<?php echo $questionsapi->getCurrentSet() ?>">Study</a>
    </div>
    
    <?php 

if (isset($_GET['missed']) && isset($_GET['correct'])) {
    echo '<!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="results" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Results</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    You answered <span class="text-success">'.$_GET['correct'].'</span> correctly, and <span class="text-danger">'.$_GET['missed'].'</span> incorrectly.
    </div>
    <div class="modal-footer">
    <a href="/?study='.$questionsapi->getCurrentSet().'" class="btn btn-secondary">Study Again</a>
    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>';
}
?>

<div class="card" style="max-width: 700px; margin: auto;">
    <table class="table table-striped" style="max-width: 700px; margin: auto; overflow:hidden;">
        <tr>
            <th>Definition</th>
            <th>Term</th>
        </tr>
        <?php

foreach ($questionkeys as $key) {
    echo "<tr><td>{$key}</td><td>{$questions[$key]}</td></tr>";
}
?>
</table>
</div>
</main>