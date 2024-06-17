<meta charset='utf8'>
<?php
session_start();
if ($_SESSION["check"] != "user") {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberId = $_SESSION["memberId"];
    $postId = intval($_POST["postId"]);
    $comment = $_POST["comment"];


    $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
    if (!$link) {
        die("無法連接資料庫: " . mysqli_connect_error());
    }


    // 插入留言
    $comment = mysqli_real_escape_string($link, $comment);
    $sql = "INSERT INTO comments (postId, memberId, comment, created_at) VALUES ($postId, $memberId, '$comment', NOW())";
    if (mysqli_query($link, $sql)) {
        echo "留言已發佈。<br>";
    } else {
        echo "Error: " . mysqli_error($link);
    }


    mysqli_close($link);


    // 重新導向回到論壇發佈詳細頁面
    header("Location: forum_post.php?postId=" . $postId);
    exit();
} else {
    header("Location: forum.php");
    exit();
}
?>
