<?php

class Sets {
    private $username;

    function __construct(string $usernameInput) {
        $this->setUsername($usernameInput);
    }

    function setUsername(string $usernameInput): void {
        $this->username = $usernameInput;
    }

    function getUsername(): string {
        return $this->username;
    }

    function getSets():array {
        $sets = file_get_contents("database/users/{$this->username}/sets.json");
        $sets = json_decode($sets,true);
        return $sets;
    }

}

?>