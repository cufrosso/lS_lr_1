<?php
    session_start();
    if ($_SESSION['user'])
    {
        header('Location: profile.php');
    }
?>

<html> <!-- lang="en"-->
<head>
    <!-- <meta charset="UTF-8"> -->
    <title>Sign up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Форма регистрации -->
    <form action="vendor/sign_up.php" method="post"> <!-- enctype="multipart/form-data" -->
        <h2><center>Sign up</center></h2>

        <label>login</label>
        <input type="text" name="login" placeholder="login">

        <label>email</label>
        <input type="email" name="email" placeholder="example@mail.com">

        <label>password</label>
        <input type="password" name="password" placeholder="your password">

        <label>password confirm</label>
        <input type="password" name="password_confirm" placeholder="confirm password">

        <label>secret word</label>
        <input type="password" name="secret_word" placeholder="secret">

        <button type="submit">sign up</button>
        <p> Already have account? Well, just <a href="login.php">log in</a> ) </p>
        <?php
            if ($_SESSION['message'])
            {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
