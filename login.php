<?php
session_start();
if ($_SESSION['user'])
{
    header('Location: profile.php');
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Форма авторизации -->
    <form action="vendor/sign_in.php" method="post">
        <h2><center>Log in</center></h2>

        <label>login</label>
        <input type="text" name="login" placeholder="login">

        <label>password</label>
        <input type="password" name="password" placeholder="your passowrd">

        <button type="submit">log in</button> <p><a href="recovery.php">forgot pass(</a></p>
        <p> Don't have account, just <a href="signup.php">sign up</a> </p>
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
