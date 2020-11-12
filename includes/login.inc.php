<?php
    if(isset($_POST["submit"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once "dbh.inc.php";
        require_once "functions.inc.php";

        // checking if email input is empty
        if (emptyInputLogin($email, $password) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $email, $password);
    } else {
        header("location: ../login.php");
        exit();
    }