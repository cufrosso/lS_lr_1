<?php
    session_start();
    require_once 'connect.php';

    $password_old = $_POST['password_old'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $login = $_POST['login'];

    $login = mysqli_real_escape_string($connect,$_POST['login']);
    $sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' LIMIT 1");

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
            if (mysqli_num_rows($sql) === 1)
            {

                $user = mysqli_fetch_assoc($sql);
                if(password_verify($password_old, $user['password']))
                {

                    $new_password = password_hash($password, PASSWORD_BCRYPT);

                    $update = mysqli_query($connect,"UPDATE `users` SET  `password` = '$new_password' WHERE `login` = '$login' LIMIT 1");
                    if($update)
                    {
                        $_SESSION['message'] = 'password changed successfully, your password is strong';
                        header('Location: ../profile.php');
                    }
                    else
                    {
                        $_SESSION['message'] = 'error in data base';
                        header('Location: ../upd.php');
                    }

                }
                else
                {
                    $_SESSION['message'] = 'wrong old password';
                    header('Location: ../upd.php');
                }

            }
            else
            {
                $_SESSION['message'] = 'wrong username';
                header('Location: ../upd.php');
            }

        }
        else
        {
            $_SESSION['message'] = "passwords don't match";
            header('Location: ../upd.php');
        }
    }
