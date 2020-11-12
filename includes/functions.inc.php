<?php
    // function of checking empty in signup page
    function  emptyInputSignUp($username, $email, $password, $confirmpass) {
        $result;
        if (empty($username) || empty($email) || empty($password) || empty($confirmpass)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    // function of checking username is proper
    function  invalidUsername($username) {
        $result;
        if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    // function of validate email
    function  invalidEmail($email) {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    // function of checking two passwords are the same
    function  passwordMatch($password, $confirmpass) {
        $result;
        if ($password !== $confirmpass) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    // function of checking email exists in database in signup page
    function emailExists($conn, $email) {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: ../signup.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }
        mysqli_stmt_close();
    }
    // function of inserting user to database
    function createUser($conn, $username, $email, $password) {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: ../signup.php?error=stmtfailed');
            exit();
        }

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPass);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close();

        header('location: ../signup.php?error=none');
        exit();
    }

    // function of checking empty in login page
    function emptyInputLogin($email, $password) {
        $result;
        if (empty($email) || empty($password)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // function of checking email exists in database in login page
    function loginUser($conn, $email, $password) {
        $emailExists = emailExists($conn, $email);
        if ($emailExists === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        // checking hashed password
        $passHashed = $emailExists["password"];
        $checkPass = password_verify($password, $passHashed);

        if ($checkPass === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        } else if ($checkPass === true) {
            session_start();
            $_SESSION["userId"] = $emailExists["userId"];
            $_SESSION["email"] = $emailExists["email"];
            header("location: ../index.php");
            exit();
        }
    }