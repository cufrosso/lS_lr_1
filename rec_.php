<?php
    session_start();
    require_once 'connect.php';

    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $secret_word = $_POST['secret_word'];
    $login = $_POST['login'];

    $login = mysqli_real_escape_string($connect,$_POST['login']);
    $sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' LIMIT 1");

    $user = mysqli_fetch_assoc($sql);
    if(password_verify($secret_word, $user['secret_word'])) #некорректное сравнение: сравнение с любым secret_word из любого поля
    {
        if ($password === $password_confirm)
        {
            if (mysqli_num_rows($sql) === 1)
            {

                $new_password = password_hash($password, PASSWORD_BCRYPT);

                $update = mysqli_query($connect,"UPDATE `users` SET  `password` = '$new_password' WHERE `login` = '$login' LIMIT 1");
                if($update)
                {
                    $_SESSION['message'] = 'Password changed successfully';
                    header('Location: ../login.php');
                }
                else
                {
                    $_SESSION['message'] = 'error in data base';
                    header('Location: ../recovery.php');
                }

            }
            else
            {
                $_SESSION['message'] = 'wrong username';
                header('Location: ../login.php');
            }

        }
        else
        {
            $_SESSION['message'] = "passwords don't match";
            header('Location: ../recovery.php');
        }
    }
    else {
        $_SESSION['message'] = "wrong secret word";
        header('Location: ../recovery.php');
    }
