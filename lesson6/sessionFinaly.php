<?php
    session_start();

    echo "Третья страница была открыта " . $_SESSION['page_count'] . " раз.";