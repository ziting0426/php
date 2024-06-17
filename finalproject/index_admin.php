<?php
    session_start();
    if($_SESSION["check"] != "admin"){
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>首頁</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="index_admin.css">  
</head>

<body>

    <div class="head0">
    <div class="head">  

    <div class="word0">Go With Me</div>

    <div class="info">
        <a href="logout.php" class="a2">登出</a>
        <a href="cart.php" class="avater-frame1"></a>
        <a href="personInfo.php" class="avater-frame2"></a>
    </div>

    <a href="index_Taipei.php" class="a1">台北</a>
    <a href="index_Taichung.php" class="a1">台中</a>
    <a href="index_Kaohsiung.php" class="a1">高雄</a>

    

    <div class="add-attraction-form">
    <div class="links-container">
        <a href="#" id="index_admin">新增景點選項</a>
        <a href="data.php">數據統整</a>
    </div>

    <h2>新增景點</h2>
    <form action="add_attraction.php" method="post">
        <div class="select-wrapper">
            <select id="CityName" name="CityName" required>
                <option value="Taipei">台北</option>
                <option value="Taichung">台中</option>
                <option value="Kaohsiung">高雄</option>
            </select><br>
        </div>
        <label for="attractionName">景點名稱:</label><br>
        <input type="text" id="attractionName" name="attractionName" required><br>
        <label for="description">描述:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" value="新增">
    </form>
    </div><br><br>



</body>
</html>
