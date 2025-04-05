<?php
class DeleteSet
{
    private $username;
    private $setname;
    function __construct($usernameInput, $setnameInput)
    {
        $this->username = $usernameInput;
        $this->setname = $setnameInput;

        $this->delete();

        Header("Location: ?sets");

    }

    function delete()
    {

        unlink("database/users/{$this->username}/sets/{$this->setname}.json");

        $sets = file_get_contents("database/users/{$this->username}/sets.json");
        $sets = json_decode($sets, true);

        $spot = array_search($this->setname, $sets);

        unset($sets[$spot]);

        $sets = json_encode($sets, true);

        file_put_contents("database/users/{$this->username}/sets.json", $sets);

    }

}