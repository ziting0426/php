<?php
    session_start();
    session_destroy();
    echo "即將跳轉登入頁面";
    header("Refresh:3;url=login.html");
?>