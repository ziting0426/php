<?php
    session_start();
    if($_SESSION["check"] == "chair"){
        echo "登入成功，此為chair網頁<br><br><br>";
        echo "<a href='logout.php'>登出</a>";
    }else{
        include 'include.inc';
    }
?>