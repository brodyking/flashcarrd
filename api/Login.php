<?php

class Login {
    private $username;
    private $password;
    private $email;

    function __construct(string $usernameInput,string $passwordInput) {
        $this->setUsername($usernameInput);
        $this->setPassword($passwordInput);


        if (is_dir("database/users/{$this->getUsername()}")) {

            if (file_exists("database/users/{$this->getUsername()}/account.json")) {

                $accountdata = file_get_contents("database/users/{$this->getUsername()}/account.json");
                $accountdata = json_decode($accountdata,true);
                
                if ($this->getUsername() == $accountdata["username"] && $this->password == $accountdata["password"]) {

                    $newid = random_int(0,100000000);

                    $newidjson = [$newid];
                    $newidjson = json_encode($newidjson,JSON_PRETTY_PRINT);

                    file_put_contents("database/users/{$this->username}/session.json",$newidjson);

                    setcookie("username",$this->getUsername(), time() + (86400 * 30), "/");
                    setcookie("id",$newid, time() + (86400 * 30), "/");
                
                    Header("Location: /?home");;

                } else {
                    Header("Location: /?error=Incorrect Login");
                }

            } else {
                Header("Location: /?error=User Doesnt Exist");
            }

        } else {
            Header("Location: /?error=User Doesnt Exist");
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

}

?>