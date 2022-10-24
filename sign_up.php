<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $secret_word = $_POST['secret_word'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_user) === 0)
    {
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(strlen($password) < 4 || !$number || !$uppercase || !$lowercase || !$specialChars)
        {
            $_SESSION['message'] = "password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character";
            header('Location: ../signup.php');
        }
        else
        {
            if ($password === $password_confirm)
            {
                $password_hsh = password_hash($password, PASSWORD_BCRYPT);
                $secret_word_hsh = password_hash($secret_word, PASSWORD_BCRYPT);
                if (!empty($login) && !empty($email) && !empty($password) && !empty($password_confirm) && !empty($secret_word))
                {
                    mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`,`secret_word`) VALUES (NULL, '$login', '$email', '$password_hsh','$secret_word_hsh')");
                    header('Location: ../login.php');
                    $_SESSION['message'] = "your password is strong";
                }
                else
                {
                    $_SESSION['message'] = "empty field";
                    header('Location: ../signup.php');
                }
            }
            else
            {
                $_SESSION['message'] = "passwords don't match";
                header('Location: ../signup.php');
            }
        }
    }
    else
    {
        $_SESSION['message'] = "username already exists";
        header('Location: ../signup.php');
    }
?>
