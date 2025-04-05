<?php
class CreateSet
{
    private $username;
    private $setname;
    private $setquestions;

    function __construct($usernameInput, $setnameInput)
    {
        $this->username = $usernameInput;
        $this->setname = $setnameInput;

        $this->decodehead();
        $this->create();

        Header("Location: ?viewset={$this->setname}");

    }

    function decodehead()
    {

        $questionscount = $_POST["questionsAmountInput"];
        $questions = [];

        for ($i = 0; $i < $questionscount; $i++) {
            $questions[$_POST["question-{$i}"]] = $_POST["answer-{$i}"];
        }

        $this->setquestions = $questions;

    }

    function create()
    {


        $set = [
            "set.name" => $this->setname,
            "set.questions" => $this->setquestions
        ];

        $set = json_encode($set, JSON_PRETTY_PRINT);

        file_put_contents("database/users/{$this->username}/sets/{$this->setname}.json", $set);

        $sets = file_get_contents("database/users/{$this->username}/sets.json");
        $sets = json_decode($sets, true);
        array_push($sets, $this->setname);
        $sets = json_encode($sets, JSON_PRETTY_PRINT);

        file_put_contents("database/users/{$this->username}/sets.json", $sets);

    }

}