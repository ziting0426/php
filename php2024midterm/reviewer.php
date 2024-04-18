<?php
    session_start();
    if(! $_SESSION["check"] == "reviewer"){
        include 'include.inc';
    }
?>

    <form action="showreview.php" method="post">
        <h1>Reviewer您好，歡迎進入論文評論網頁</h1>
        論文評審決定:
        Accept<input type="radio" name="decide" value = "accept">
        Minor Revision<input type="radio" name="decide" value = "minor revision">
        Major Revision<input type="radio" name="decide" value = "major revision">
        Reject<input type="radio" name="decide" value = "reject">
        <br><br><br>論文評論評語:
        <textarea name='comment' cols='30' rows='10'></textarea>
        <br><br><br>
        <input type="submit" value="提交">
    </form>
    <br><br><br>
    <a href="logout.php">登出</a>
