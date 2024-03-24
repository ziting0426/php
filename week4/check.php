<?php
    session_start();
    $Saccount = "aaabbbccc";
    $Spwd = "123123123";
    $account = $_POST["account"];
    $pwd = $_POST["pwd"];
    $_SESSION["check"] = "NO";
    if(($Saccount == $account) && ($Spwd == $pwd)){
        $_SESSION["check"] = "YES";
        header("Location:IMformWrite.php");
    }else{
        header("Location:fail.php");
    }
?>