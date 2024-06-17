<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="cssreset.css"> 
        <link rel="stylesheet" href="add.css">  
    </head>

    <body>

    <div class="head0">
    <div class="head">  

    <div class="word0">Go With Me</div>

    <div class="info">
        <a href="logout.php" class="a3">登出</a>
        <a href="cart.php" class="avater-frame1"></a>
        <a href="personInfo.php" class="avater-frame2"></a>
    </div>

    <a href="cart.php" class="a1">返回購物車</a>
    <a href="index_user.php" class="a1">首頁</a>
    <div class="place2"></div>

    </body>
    </html>


<?php

    session_start();
    if($_SESSION["check"] != "user"){
        header("Location: login.php");
        exit();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cartId = $_POST["cartId"];


        // 連接資料庫
        $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
        if (!$link) {
            die("無法連接資料庫: " . mysqli_connect_error());
        }


        // 刪除購物車中的資料
        $sql = "DELETE FROM cart WHERE cartId = $cartId";
        if (mysqli_query($link, $sql)) {
            echo "<div class='word' >行程已刪除。<br><br><br></div>";
        } else {
            echo "Error: " . mysqli_error($link);
        }

        mysqli_close($link);
    } else {
        header("Location: index_user.php");
        exit();
    }
?>

