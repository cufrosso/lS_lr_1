<?php
    $connect = mysqli_connect('localhost', 'root', '', 'lr_1');
    if (!$connect)
    {
        die('Error connect to DB');
    }
