<?php

class Questions {
    private $username;
    private $currentset;

    private $questions;

    function __construct(string $usernameInput,string $currentsetInput) {
        $this->setUsername($usernameInput);
        $this->setCurrentSet($currentsetInput);
    }

    function setUsername(string $usernameInput): void {
        $this->username = $usernameInput;
    }

    function getUsername(): string {
        return $this->username;
    }

    function setExists(string $setInput): bool {
        if (file_exists("database/users/{$this->username}/sets/{$setInput}.json")) {
            return true;
        } else {
            return false;
        }
    } 

    function setCurrentSet(string $currentsetInput): void {

        if ($this->setExists($currentsetInput)) {
            $this->currentset = $currentsetInput;
        } else {
            $this->currentset = null;
            trigger_error("Set dosent exist");
        }

    }

    function getCurrentSet(): string {
        return $this->currentset;
    }

    function getQuestions(): array {
        if ($this->currentset != null) {
            $questions = file_get_contents("database/users/{$this->username}/sets/{$this->currentset}.json");
            $questions = json_decode($questions,true);
            $questions = $questions["set.questions"];
            return $questions;
        } else {
            trigger_error("Set dosent exist in getQuestions();");
        }
        return [];
    }

    function getQuestionsKeys(): array {
        if ($this->currentset != null) {
            return array_keys($this->getQuestions());
        } else {
            trigger_error("Set dosent exist in getQuestionsKeys();");
        }
        return [];
    }

}

?>