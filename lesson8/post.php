<?php

    $nameUser = $_POST['nameUser'];
    session_start();
    $_SESSION['nameUser'] = $nameUser;

    header('location: index.php');