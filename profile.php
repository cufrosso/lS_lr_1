<?php
session_start();
if (!$_SESSION['user'])
{
    header('Location: /');
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form>
        <h2><center>Profile</center></h2>
        <h2 style="margin: 10px 0;"> Welcome, <?php echo $_SESSION['user']['login']; ?> </h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="upd.php">update password</a>
        <a href="vendor/logout.php" class="logout">log out</a>
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
