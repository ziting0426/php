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

    <a href="forum.php" class="a1">返回論壇</a>
    <a href="index_user.php" class="a1">首頁</a>
    <div class="place2"></div>
    <div class="word">\\論壇留言區//</div></br>

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


$postId = intval($_GET['postId']);


// 查詢特定的論壇發佈
$sql = "SELECT postId, memberId, content, created_at FROM forum WHERE postId = $postId";
$result = mysqli_query($link, $sql);
$post = mysqli_fetch_assoc($result);


echo "<div class='post-container'>";
echo "<div class='post-content'>" . $post["content"] . "</div>";
echo "<div class='post-time'>發佈時間: " . $post["created_at"] . "</div>";
echo "</div>";


// 查詢該發佈的所有留言
$sql_comments = "SELECT commentId, memberId, comment, created_at FROM comments WHERE postId = $postId ORDER BY created_at DESC";
$result_comments = mysqli_query($link, $sql_comments);

echo "</br><div class='word'>先前的留言:</div></br></br>";

while ($comment = mysqli_fetch_assoc($result_comments)) {
    echo "<div class='post-container'>";
    echo "<div class='post-content'>會員 " . $comment["memberId"] . ":</div>";
    echo "<div class='post-content'>會員 " . $comment["comment"] . ":</div>";
    echo "<div class='post-time'>留言時間: " . $comment["created_at"] . "</div>";
    echo "</div>";
}


// 留言表單
echo "</br><div class='word'>新增留言</div></br></br>";

echo "<form action='add_comment.php' method='post'>
        <input type='hidden' name='postId' value='" . $postId . "'>
        <textarea name='comment' class='comment-textarea' rows='4' cols='50'></textarea><br>
        <input class='link' type='submit' value='發佈留言'>
      </form>";


mysqli_close($link);
?>
