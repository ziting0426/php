<?php
session_start();
if($_SESSION["check"] != "user"){
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberId = $_SESSION["memberId"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $gender = $_POST["gender"];

    $link = @mysqli_connect('localhost','root','001ac','phpclass');
    if (!$link) {
        die("無法連接資料庫: " . mysqli_connect_error());
    }

    $sql = "UPDATE member SET Email='$email', Password='$password', gender='$gender' WHERE No = $memberId";
    if (mysqli_query($link, $sql)) {
        echo "資料更新成功";
    } else {
        echo "資料更新失敗: " . mysqli_error($link);
    }

    mysqli_close($link);

    // 重新導向回個人資料頁面
    header("Refresh:2;url=personInfo.php");
    exit;
} else {
    echo "無效的請求";
    exit;
}
?>
