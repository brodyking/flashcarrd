<?php

class Logout {
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

    function logout() {
        unlink("database/users/{$this->getUsername()}/session.json");
        if (isset($_COOKIE['username'])) {
            unset($_COOKIE['username']); 
            setcookie('username', '', -1, '/'); 
        }
        if (isset($_COOKIE['id'])) {
            unset($_COOKIE['id']); 
            setcookie('id', '', -1, '/'); 
        }
        Header("Location: /");
    }

}

?>