<?php

class Register {
    private $username;
    private $password;
    private $email;

    function __construct(string $usernameInput,string $passwordInput,string $emailInput) {
        $this->setUsername($usernameInput);
        $this->setPassword($passwordInput);
        $this->setEmail($emailInput);


        if (!is_dir("database/users/{$this->getUsername()}")) {

            if (!file_exists("database/users/{$this->getUsername()}/account.json")) {

                $pathto = "database/users/{$this->getUsername()}/";

                $accountdata = [];
                $accountdata["username"] = $this->getUsername();
                $accountdata["password"] = $this->getPassword();
                $accountdata["email"] = $this->getEmail();
                $accountdata["joindate"] = date("m-d-Y");

                $accountdata = json_encode($accountdata,JSON_PRETTY_PRINT);

                mkdir($pathto);
                mkdir($pathto."/sets/");

                file_put_contents($pathto."account.json",$accountdata);

                $sets = [];
                $sets = json_encode($sets,JSON_PRETTY_PRINT);
                file_put_contents($pathto."sets.json",$sets);

            } else {
                Header("Location: /?error=User Already Exists");
            }

        } else {
            Header("Location: /?error=User Already Exists");
        }


    }

    function setUsername(string $usernameInput): void {
        $this->username = $usernameInput;
    }

    function getUsername(): string {
        return $this->username;
    }

    function setPassword(string $passwordInput): void {
        $this->password = $passwordInput;
    }

    function getPassword(): string {
        return $this->password;
    }

    function setEmail(string $emailInput): void {
        $this->email = $emailInput;
    }

    function getEmail(): string {
        return $this->email;
    }

}

?>