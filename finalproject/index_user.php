<?php
    session_start();
    if($_SESSION["check"] != "user"){
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="cssreset.css">  
    <link rel="stylesheet" href="index_user.css"> 
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

    </div> 
    </div>
    <div class="place1"></div>

    <div class="word2">最受歡迎</div>
    <div class="word3">全台網友都在+1的好評行程...</div>

    <div class="content">
        <?php
               $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
            //SQL語法
            $SQL = "SELECT * FROM attraction";

            $result = mysqli_query($link,$SQL);

            while($row = mysqli_fetch_assoc($result)){
                echo $row["attractionName"];
                echo "</br>";
            }

            echo "...";
        ?>
    </div>

    
    <div class="place2">
    <a href="index_Taipei.php" class="avater-frame3"></a>
    <a href="index_Taichung.php" class="avater-frame4"></a>
    <a href="index_Kaohsiung.php" class="avater-frame5"></a>
    </div>
    <div class="place3">
    <div class="word4">ㄑ台北</div>
    <div class="word5">ㄑ台中</div>
    <div class="word6">ㄑ高雄</div>
    </div>
</body>
</html>
