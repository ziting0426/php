<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="cssreset.css"> 
        <link rel="stylesheet" href="forum.css">  
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

    <a href="index_user.php" class="a1">首頁</a>
    <div class="place2"></div>
    <div class="word">\\論壇討論區//</div></br>

</body>
</html>

<?php

session_start();
if ($_SESSION["check"] != "user") {
    header("Location: login.php");
    exit();
}


$link = @mysqli_connect('localhost','a1113306','3306','gowithme');
if (!$link) {
    die("無法連接資料庫: " . mysqli_connect_error());
}


// 查詢所有的論壇發佈
$sql = "SELECT postId, memberId, content, created_at FROM forum ORDER BY created_at DESC";
$result = mysqli_query($link, $sql);


while ($row = mysqli_fetch_assoc($result)) {

    echo "<div class='post-container'>";
    echo "<div class='post-content'>" . $row["content"] . "</div>";
    echo "<div class='post-time'>發佈時間: " . $row["created_at"] . "</div>";
    echo "<a class='post-link' href='forum_post.php?postId=" . $row["postId"] . "'>查看留言</a>";
    echo "</div>";
}

mysqli_close($link);
?>



