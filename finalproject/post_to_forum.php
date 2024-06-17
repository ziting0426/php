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

    <a href="forum.php" class="a1">查看論壇</a>
    <a href="index_user.php" class="a1">首頁</a>
    <div class="place2"></div>
    <div class="word">行程已發布到論壇。</div>

</body>
</html>


<?php

echo"<div class='place1'></div>";

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


// 準備論壇發佈內容
$forum_content = "<h3>會員 " . $memberId . " 的行程:</h3><br>";
while ($row = mysqli_fetch_assoc($result)) {
    $attractionName = mysqli_real_escape_string($link, $row["attractionName"]);
    $forum_content .= $attractionName . "<br><br>";
}


// 插入論壇發佈
$forum_content = mysqli_real_escape_string($link, $forum_content);
$forum_sql = "INSERT INTO forum (memberId, content, created_at) VALUES ($memberId, '$forum_content', NOW())";
if (!mysqli_query($link, $forum_sql)) {
    echo "Error: " . mysqli_error($link);
}


// 清空購物車
$clear_cart_sql = "DELETE FROM cart WHERE memberId = $memberId";
if (!mysqli_query($link, $clear_cart_sql)) {
    echo "Error: " . mysqli_error($link);
}


mysqli_close($link);
?>
