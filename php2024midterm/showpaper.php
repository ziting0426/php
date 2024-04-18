<?php
    session_start();
    if($_SESSION["check"] == "author"){
        $head = $_POST["head"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $short = nl2br($_POST["short"]);
        echo "論文標題:<br>".$head."<br>";
        echo "作者姓名:<br>".$name."<br>";
        echo "作者Email::<br>".$email."<br>";
        echo "論文摘要:<br>".$short;
        echo "<br><br><br><a href='logout.php'>登出</a>";
    }
    else{
        include 'include.inc';
    }
?>