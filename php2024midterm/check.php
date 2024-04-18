<?php
    session_start();
    $char = $_POST["char"];
    $account = $_POST["account"];
    $password = $_POST["password"];

    $account1 = "chair";
    $password1 = "123";

    $account2 = "reviewer";
    $password2 = "234";

    $account3 = "author";
    $password3= "345";

    $date = strtotime("+7 days",time());

    if($char == "Chair" && $account == $account1 && $password == $password1){
        $_SESSION["check"] ="chair";
        setcookie("uName",$account,$date);
        header("Location:chair.php");
    }
    else if($char == "Reviewer" && $account == $account2 && $password == $password2){
        $_SESSION["check"] ="reviewer";
        setcookie("uName",$account,$date);
        header("Location:reviewer.php");
    }
    else if($char == "Author" && $account == $account3 && $password == $password3){
        $_SESSION["check"] ="author";
        setcookie("uName",$account,$date);
        header("Location:author.php");
    }
    else{
        include 'include.inc';
    }
?>