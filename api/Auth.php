<?php

class Auth {
    private $username;
    private $session;

    function __construct(string $usernameInput,$sessionInput) {
        $this->setUsername($usernameInput);
        $this->setSession($sessionInput);
    }

    function setUsername(string $usernameInput): void {
        $this->username = $usernameInput;
    }

    function getUsername(): string {
        return $this->username;
    }

    function setSession(string $sessionInput): void {
        $this->session = $sessionInput;
    }

    function getSession(): string {
        return $this->session;
    }

    function verify(): bool {

        if (is_dir("database/users/{$this->getUsername()}")) {
            if (file_exists("database/users/{$this->getUsername()}/account.json")) {

                $accountdata = file_get_contents("database/users/{$this->getUsername()}/account.json");
                $accountdata = json_decode($accountdata,true);
               
                $storedsession = file_get_contents("database/users/{$this->username}/session.json");
                $storedsession = json_decode($storedsession);
                $storedsession = $storedsession[0];

                if ($this->getUsername() == $accountdata["username"] && $this->session == $storedsession) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

}

?>