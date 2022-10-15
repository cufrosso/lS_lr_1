<?php
session_start();
?>

<html>
<head>
    <title>Recovery pass</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <form action="vendor/rec_.php" method="post">
        <h2><center>Recovery password</center></h2>
        <label>login</label>
        <input type="text" name="login" placeholder="login">

        <label>secret word</label>
        <input type="password" name="secret_word" placeholder="secret word">

        <label>password</label>
        <input type="password" name="password" placeholder="your password">

        <label>confirm password</label>
        <input type="password" name="password_confirm" placeholder="confirm password">

        <button type="submit">change password</button>
        <a href="login.php">cancel</a>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
