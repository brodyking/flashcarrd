<?php

class User {
    private $username;
    private $password;
    private $email;
    private $joindate;

    private $userjson;


    function __construct(string $usernameInput) {
        $this->setUsername($usernameInput);
        $this->userjson = json_decode(file_get_contents("database/users/{$this->username}/account.json"), true);
        $this->password = $this->userjson["password"];
        $this->email = $this->userjson["email"];
        $this->joindate = $this->userjson["joindate"];
    }

    function setUsername(string $usernameInput): void {
        $this->username = $usernameInput;
    }

    function getUsername(): string {
        return $this->username;
    }
    function getEmail(): string {
        return $this->email;
    }

    function getPassword(): string {
        return $this->password;
    }
    function getJoindate(): string {
        return $this->joindate;
    }
}

?>