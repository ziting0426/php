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

    <input class="a1" type ="button" onclick="history.back()" value="返回上頁"></input>
    <a href="cart.php" class="a1">查看目前購物車資料</a>
    <a href="index_user.php" class="a1">首頁</a>
    <div class="place2"></div>

</body>
</html>
    

<?php
//用來將行程添加至購物車的檔案

echo"<div class='place1'></div>";

session_start();
if($_SESSION["check"] != "user"){
    header("Location:login.php");
    exit; // 確保在重新導向之後程式停止執行
}

// 檢查是否有傳遞景點名稱
if(isset($_GET["attractionName"])) {
    $sName = $_GET["attractionName"];

    // 連接資料庫
    $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
    if (!$link) {
        die("無法連接資料庫: " . mysqli_connect_error());
    }

    // 獲取登入用戶的會員ID
    $memberId = $_SESSION["memberId"];

    // 將行程加入購物車
    $SQL = "INSERT INTO cart (attractionName, memberId) VALUES ('$sName', $memberId)";
    $result = mysqli_query($link, $SQL);

    if($result){
        echo "<div class='word'>新增成功!</br></br></br></br></br></div>";
    } else {
        echo "新增失敗";
    }

    mysqli_close($link);
} else {
    echo "未提供景點名稱";
}



?>

