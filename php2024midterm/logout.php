<?php
    session_start();
    session_destroy();
    echo "登出中，三秒後將回登入首頁";
    header("Refresh:3;url=index.php");
?>