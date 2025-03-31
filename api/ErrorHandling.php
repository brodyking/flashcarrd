<?php
class ErrorHandling {
    private $message;
    function getError() {
        echo "<div class='alert alert-danger mb-0 rounded-0' role='alert'>{$this->message}</div>";
    }
    function detectError(): bool {
        if (isset($_GET["error"])){
            $this->message = $_GET["error"];
            return true;
        }
        return false;
    }
    function setError(string $messageInput) {
        $this->message = $messageInput;
    }
}