<?php
    session_start();

    if(isset($_SESSION['page_count'])) {
        $countOpen = $_SESSION['page_count'];
    } else {
        $countOpen = 0;
    }

    echo "Третья страница была открыта " . $countOpen . " раз.";