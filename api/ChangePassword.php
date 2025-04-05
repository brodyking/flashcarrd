<?php

class ChangePassword
{
    private $username;
    private $oldpassword;
    private $newpassword;

    function __construct(string $usernameInput, $oldPasswordInput, $newPasswordInput)
    {
        $this->setUsername($usernameInput);
        $this->setOldPassword($oldPasswordInput);
        $this->setNewPassword($newPasswordInput);

        $this->changepswd();

    }

    function setUsername(string $usernameInput): void
    {
        $this->username = $usernameInput;
    }

    function getUsername(): string
    {
        return $this->username;
    }

    function setNewPassword(string $passwordInput): void
    {
        $this->newpassword = $passwordInput;
    }

    function getNewPassword(): string
    {
        return $this->newpassword;
    }

    function setOldPassword(string $passwordInput): void
    {
        $this->oldpassword = $passwordInput;
    }

    function getOldPassword(): string
    {
        return $this->oldpassword;
    }

    function changepswd()
    {
        $userdata = file_get_contents("database/users/{$this->getUsername()}/account.json");
        $userdata = json_decode($userdata, true);

        if ($this->oldpassword != $userdata["password"]) {
            Header("Location: /?settings&error=Incorrect Old Password");
        } else {
            $userdata["password"] = $this->newpassword;
            $userdata = json_encode($userdata, JSON_PRETTY_PRINT);
            file_put_contents("database/users/{$this->username}/account.json", $userdata);
            Header("Location: /?logout");
        }

    }

}

?>