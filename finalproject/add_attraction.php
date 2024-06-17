<?php
session_start();
if($_SESSION["check"] != "admin"){
    header("Location:login.php");
    exit; // 確保在重定向後結束程式執行
}

// 如果是 admin，處理表單提交
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // 連接到資料庫
    $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
    if(!$link){
        die("資料庫連接失敗: " . mysqli_connect_error());
    }

    // 接收表單提交的資料
    $attractionName = $_POST['attractionName'];
    $description = $_POST['description'];
    $CityName = $_POST['CityName'];

    // 執行 SQL INSERT 語句將資料插入到資料庫中
    $sql = "INSERT INTO attraction (attractionName, description, CityName) VALUES ('$attractionName', '$description', '$CityName')";
    if(mysqli_query($link, $sql)){
        // 新景點成功添加的畫面美化
        echo "<div style='background-color: #F0F0F0; padding: 10px; border-radius: 5px;'>";
        echo "<p class='success-message'>新景點已成功添加到資料庫。</p>";
        // 加入首頁連結
        echo "<p><a href='index_admin.php'>返回首頁</a></p>";
        echo "</div>";
    } else{
        echo "ERROR: 資料無法插入到資料庫: " . mysqli_error($link);
    }

    // 關閉資料庫連接
    mysqli_close($link);
}
?>
