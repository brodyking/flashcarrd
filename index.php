<!DOCTYPE html>
<html>

<head>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/main.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/logo-180.png">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title>Flashcarrd</title>
</head>

<body>

    <?php

    include "api/ErrorHandling.php";
    include "api/Register.php";
    include "api/Login.php";
    include "api/Questions.php";
    include "api/Logout.php";
    include "api/Auth.php";
    include "api/User.php";
    include "api/Sets.php";
    
    $errorapi = new ErrorHandling();
    if ($errorapi->detectError()) {
        $errorapi->getError();
    }

    function register()
    {
        $registerapi = new Register($_POST["usernameInput"],$_POST["passwordInput"], $_POST["emailInput"]);
    }
    function login()
    {
        $loginapi = new Login($_POST["usernameInput"],$_POST["passwordInput"]);
    }

    /*
    function sets()
    {
        $questionsapi = new Questions("test", "test", $_GET["set"]);
        $questionkeys = $questionsapi->getQuestionsKeys();
        $questions = $questionsapi->getQuestions();
        foreach ($questionkeys as $key) {
            echo $key . " - " . $questions[$key] . "<br>";
        }
    }
        */

    function loginpage()
    {
        include "components/loginpage.php";
    }

    function registerpage()
    {
        include "components/registerpage.php";
    }

    function logout() {
        $logoutapi = new Logout($_COOKIE["username"]);
        $logoutapi->logout();
    }    


    // If user has submitted a login form
    if (isset($_GET["login"])) {
        login();
    }
    // If a user has submitted a register form
    else if (isset($_GET["register"])) {
        register();
        login();
    }
    // If a user has requested a logout 
    else if (isset($_GET["logout"])) {
        logout();
    }
    // Route user to login page
    else if (isset($_GET["loginpage"])){
        loginpage();
    // Route user to register page
    }  else if (isset($_GET["registerpage"])){
        registerpage();
    }
    // If user dosent has cookies for a login
    else if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"])) {
        loginpage();
    } else {
        // If they do, verify auth
        $authapi = new Auth($_COOKIE["username"], $_COOKIE["id"]);
        if (!$authapi->verify()) {
            // If incorrect login details in cookies, send them to login
            loginpage();
        } else {
            // If correct login details, check the location they are attempting to visit. 
            // set for viewing a set of cards, home is default.

            $userapi = new User($_COOKIE["username"]);

            if (isset($_GET["sets"])) { // Question Sets
                include "components/sets.php";
            } else if (isset($_GET["viewset"])) {
                include "components/viewset.php";
            } else if (isset($_GET["study"])) {
                include "components/study.php";
            }
            else {
                include "components/home.php";
            }
        }
    }

    include "components/footer.php";

    ?>
    
    <script src="assets/darkmodetoggle.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <?php 
    if (isset($_GET['missed']) && isset($_GET['correct'])) {
    echo '<script src="assets/results.js"></script>';
    }
    ?>

</body>

</html>