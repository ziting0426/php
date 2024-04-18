<?php
    session_start();
    if($_SESSION["check"] == "reviewer"){
        $decide = $_POST["decide"];
        $comment = nl2br($_POST["comment"]);
        echo "論文評審決定:".$decide."<br><br><br>";
        echo "論文評審評語:<br>".$comment;
        echo "<br><br><br><a href='logout.php'>登出</a>";
    }
    else{
        include 'include.inc';
    }
?>