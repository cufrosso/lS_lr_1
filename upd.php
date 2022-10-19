<?php
session_start();
?>

<html>
<head>
    <title>Update pass</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <form action="vendor/upd_.php" method="post">
        <h2><center>update password</center></h2>
        <label>login</label>
        <input type="text" name="login" placeholder="login">

        <label>old password</label>
        <input type="password" name="password_old" placeholder="old password">

        <label>new password</label>
        <input type="password" name="password" placeholder="new password">

        <label>confirm password</label>
        <input type="password" name="password_confirm" placeholder="new password">

        <button type="submit">update password</button>
        <a href="profile.php">cancel</a>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
