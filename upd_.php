<?php
    #ob_start();
    session_start();
    require_once 'connect.php';

    $password_old = $_POST['password_old'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $login = $_POST['login'];

    $login = mysqli_real_escape_string($connect,$_POST['login']);
    $sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' LIMIT 1");

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
                    $_SESSION['message'] = 'password changed successfully';
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
