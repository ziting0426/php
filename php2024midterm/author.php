<?php
    session_start();
    if(! $_SESSION["check"] == "author"){
        include 'include.inc';
    }
?>

<form action="showpaper.php" method = "post">
    <h1>Author您好，歡迎進入論文投稿網頁</h1>
    論文標題:
    <br>
    <input type="text" name="head">
    <br>
    作者姓名:
    <input type="text" name="name">
    <br>
    作者Email:
    <input type="text" name="email">
    <br>
    論文摘要:
    <textarea name="short" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="提交">
</form>
<br><br><br>
<a href="logout.php">登出</a>