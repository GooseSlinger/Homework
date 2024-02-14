<?php

session_start();

if(isset($_SESSION['page_count'])) {
    $_SESSION['page_count']++;
} else {
    $_SESSION['page_count'] = 1;
}

if($_SESSION['page_count'] % 3 == 0) {
    header("Location: sessionFinaly.php");
    exit;
}