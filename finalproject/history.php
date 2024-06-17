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

// 查詢該會員的歷史紀錄
$sql = "SELECT attractionName, created_at FROM history WHERE memberId = $memberId ORDER BY created_at DESC";
$result = mysqli_query($link, $sql);

echo "<div class='word'>您的歷史紀錄:</div></br><br>";


while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='word2'> <p>" . $row["attractionName"] . " - " . $row["created_at"] . "</p></div><br><br>";
}


mysqli_close($link);
?>
