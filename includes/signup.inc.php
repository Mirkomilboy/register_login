<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password_1'];
        $confirmpass = $_POST['password_2'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // check if inputs are empty
        if(emptyInputSignUp($username, $email, $password, $confirmpass) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        // checking username is proper
        if(invalidUsername($username) !== false) {
            header("location: ../signup.php?error=invalidusername");
            exit();    
        }
        // checking if the email is valid
        if(invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        // checking two passwords are same
        if(passwordMatch($password, $confirmpass) !== false) {
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }
        // checking if password is not less than 4 or 5 characters

        // checking username and email exists in database
        if(emailExists($conn, $email) !== false) {
            header("location: ../signup.php?error=emailnametaken");
            exit();    
        }

        createUser($conn, $username, $email, $password);

    } else {
        header("location: ../signup.php");
        exit();
    }