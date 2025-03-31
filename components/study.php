<?php

include "components/navbar-authd.php";
$questionsapi = new Questions($userapi->getUsername(), $_GET["study"]);
$questionkeys = $questionsapi->getQuestionsKeys();
$questions = $questionsapi->getQuestions();
?>
<main>
    <h1 class="pt-5 fw-semibold text-center" style="margin-top:50px;font-size:32pt;"><?php echo $questionsapi->getCurrentSet(); ?> <span id="progress"></span></span></h1>
    <div class="card p-3 text-center" style="font-size:20pt;max-width: 700px; margin: auto;">
        <p id="question">enable js</p>
        <div class="container">
            <div class="row row-cols-2">
                <div class="col"><a href="#" id="option1" onclick="answer(1)" class="text-start btn btn-lg btn-secondary w-100">enable js</a></div>
                <div class="col"><a href="#" id="option2" onclick="answer(2)" class="text-start btn btn-lg btn-secondary w-100">enable js</a></div>
            </div>
            <div class="row row-cols-2 mt-4">
                <div class="col"><a href="#" id="option3" onclick="answer(3)" class="text-start btn btn-lg btn-secondary w-100">enable js</a></div>
                <div class="col"><a href="#" id="option4" onclick="answer(4)" class="text-start btn btn-lg btn-secondary w-100">enable js</a></div>
            </div>
        </div>
        <?php
    echo "<script>var questions = [];";
    foreach ($questionkeys as $key) {
        echo "questions['{$key}'] = '{$questions[$key]}';";
    }
    echo "</script>";
    echo "<script>var questionsindex = [];";
    $questionsindexpos = 0;
    foreach ($questionkeys as $key) {
        echo "questionsindex['{$questionsindexpos}'] = '{$key}';";
        $questionsindexpos++;
    }
    echo "</script>";    
    echo "<script>var answersindex = [];";
    $questionsindexpos = 0;
    foreach ($questionkeys as $key) {
        echo "answersindex['{$questionsindexpos}'] = '{$questions[$key]}';";
        $questionsindexpos++;
    }
    echo "</script>"
    ?>

<script>
    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }
    
    function shuffle(array) {
        let currentIndex = array.length;
        
        // While there remain elements to shuffle...
        while (currentIndex != 0) {
            
            // Pick a remaining element...
            let randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;
            
            // And swap it with the current element.
            [array[currentIndex], array[randomIndex]] = [
                array[randomIndex], array[currentIndex]];
            }
        }
        
        
        let currentpos = 0;
        
        let totalquestions = questionsindex.length;
        
        var currentanswer;
        var currentquestion;
        
        var correct = 0;
        var missed = 0;
        
        function question() {
            
            currentquestion = questionsindex[currentpos];
            currentanswer = answersindex[currentpos];
            
            var answers = JSON.parse(JSON.stringify(answersindex));
            
            while(true) {
                shuffle(answers);
                if (answers[0] == currentanswer ||
                answers[1] == currentanswer ||
                answers[2] == currentanswer ||
                answers[3] == currentanswer
            ) {
                break;
            }
        }
        
        document.getElementById("option1").innerHTML = answers[0];
        document.getElementById("option2").innerHTML = answers[1];
        document.getElementById("option3").innerHTML = answers[2];
        document.getElementById("option4").innerHTML = answers[3];
        
        document.getElementById("question").innerHTML = currentquestion;
        document.getElementById("progress").innerHTML = "(" + (currentpos +1 ) + "/" + totalquestions + ")";
    }
    
    function answer(button) {
        
        if (document.getElementById("option"+button).innerHTML == currentanswer) {
            document.getElementById("option"+button).classList.remove("btn-secondary");
            document.getElementById("option"+button).classList.add("btn-success");
            setTimeout(() => {
                // Code to be executed after 1 second
                document.getElementById("option1").classList.add("btn-secondary");
                document.getElementById("option2").classList.add("btn-secondary");
                document.getElementById("option3").classList.add("btn-secondary");
                document.getElementById("option4").classList.add("btn-secondary");
                document.getElementById("option1").classList.remove("btn-danger");
                document.getElementById("option2").classList.remove("btn-danger");
                document.getElementById("option3").classList.remove("btn-danger");
                document.getElementById("option4").classList.remove("btn-danger");
                document.getElementById("option"+button).classList.remove("btn-success");
                currentpos++;
                correct++;
                if (currentpos == totalquestions) {
                    finish();
                } else {
                    question();
                }
            }, 500); // 1000 milliseconds = 1 second
        } else {
            document.getElementById("option"+button).classList.remove("btn-secondary");
            document.getElementById("option"+button).classList.add("btn-danger");
            missed++;
        }
    }
    
    function finish() {
        window.location.href = "/?viewset=<?php echo $questionsapi->getCurrentSet() ?>&missed="+missed+"&correct="+correct;
    }
    
    question();
    
    
    
    
</script>
</div>
</main>