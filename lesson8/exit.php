<?php

    session_start();
    unset($_SESSION['nameUser']);
    header('location: index.php');