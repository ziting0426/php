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

    
    <a href="history.php" class="a1">查看歷史紀錄</a>
    <a href="index_user.php" class="a1">首頁</a>
    <div class="place2"></div>
    <div class="word">行程已存入歷史紀錄。</div>

</body>
</html>


<?php

session_start();
if ($_SESSION["check"] != "user") {
    header("Location: login.php");
    exit();
}


$memberId = $_SESSION["memberId"];
$link = @mysqli_connect('localhost','a1113306','3306','gowithme');
if (!$link) {
    die("無法連接資料庫: " . mysqli_connect_error());
}


// 查詢該會員的購物車內容
$sql = "SELECT c.cartId, a.attractionName
        FROM cart c
        INNER JOIN attraction a ON c.attractionName = a.attractionName
        WHERE c.memberId = $memberId";
$result = mysqli_query($link, $sql);


// 插入歷史紀錄
while ($row = mysqli_fetch_assoc($result)) {
    $attractionName = mysqli_real_escape_string($link, $row["attractionName"]);
    $history_sql = "INSERT INTO history (memberId, attractionName, created_at) VALUES ($memberId, '$attractionName', NOW())";
    if (!mysqli_query($link, $history_sql)) {
        echo "Error: " . mysqli_error($link);
    }
}


// 清空購物車
$clear_cart_sql = "DELETE FROM cart WHERE memberId = $memberId";
if (!mysqli_query($link, $clear_cart_sql)) {
    echo "Error: " . mysqli_error($link);
}


mysqli_close($link);
?>

