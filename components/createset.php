<?php include "components/navbar-authd.php"; ?>
<main>
    <h1 class="pt-5 fw-semibold text-center" style="margin-top:50px;font-size:32pt;">
        Create
    </h1>


    <div class="card p-4" style="max-width: 700px; margin: auto;">
        <form method="POST" action="/?createsetsubmit">
            <input type="text" style="display: none;" name="usernameInput"
                value="<?php echo $userapi->getUsername(); ?>">
            <div id="questionsAmountBox">
                <input type="text" style="display: none;" value="0" name="questionsAmountInput"
                    id="questionsAmountInput">
            </div>
            <div class="mb-3">
                <label for="setNameInput">Set Name</label>
                <input class="form-control" id="setName" name="setNameInput" type="text">
            </div>
            <div id="questions">

            </div>
            <div class="mb-3">
                <a type="submit" class="btn btn-lg btn-secondary text-center" onclick="addQuestion();" href="#">New
                    Question</a>
                <button type="submit" class="btn btn-lg btn-success text-center">Create</button>
            </div>
        </form>
    </div>


    <script>

        let questionsCount = 0;

        let questions = [];
        let answers = [];

        function addQuestion() {
            questions[questionsCount] = "";
            answers[questionsCount] = "";
            questionsCount++;
            document.getElementById("questionsAmountBox").innerHTML = '<input type="text" style="display: none;" value="' + questionsCount + '" name="questionsAmountInput" id="questionsAmountInput">';
            renderQuestions();
        }

        function renderQuestions() {

            if (questionsCount > 1) {
                for (i = 0; i < questionsCount - 1; i++) {
                    questions[i] = document.getElementById("question-" + i).value;
                    answers[i] = document.getElementById("answer-" + i).value;
                }
            }

            dom = "<hr>";

            for (i = 0; i < questionsCount; i++) {
                dom += '<div class="input-group mb-3"><span class="input-group-text">#' + (i + 1) + '</span><input type="text" placeholder="Term" value="' + questions[i] + '" id="question-' + i + '" name="question-' + i + '" class="form-control"><input type="text" placeholder="Definition" value="' + answers[i] + '" id="answer-' + i + '" name="answer-' + i + '" class="form-control"></div>'
            }

            document.getElementById("questions").innerHTML = dom;
        }


    </script>


    </div>
</main>