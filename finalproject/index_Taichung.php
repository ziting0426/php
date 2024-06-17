<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="cssreset.css"> 
    <link rel="stylesheet" href="index_city.css">  
</head>

<body>
    <div class="head0">
    <div class="head">  
    <div class="word0">Go With Me</div>

    <div class="info">
       
        <?php
            if($_SESSION["check"] == "guest"){
                echo "<a href='login.php' class='a2'>登入</a>";
            }
            else if($_SESSION["check"] == "user"){
                echo "<a href='logout.php' class='a2'>登出</a>";
                echo "<a href='cart.php' class='avater-frame1'></a>";
                echo "<a href='personInfo.php' class='avater-frame2'></a>";
                
            }
        ?>

    </div>

    <a href="index_Taipei.php" class="a1">台北</a>
    <a href="index_Taichung.php" class="a1">台中</a>
    <a href="index_Kaohsiung.php" class="a1">高雄</a>
    <a href="index_user.php" class="a1">首頁</a>

    </div> 
    </div>
    <div class="place1"></div>

    <div class="word3">台中景點~~~</div>
    <hr class="hr1"></hr>

    <div class="content">

        <?php
                $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
            //SQL語法
            $SQL = "SELECT * FROM attraction WHERE CityName = 'Taichung'";

            $result = mysqli_query($link,$SQL);

            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='intro-box'>";
                echo "<p>".$row["attractionName"]."</p>";
                echo "<p>".$row["description"]."</p>";
                echo "<div class='button-container'>";
                echo "<a href='add.php?attractionName=".$row["attractionName"]."' class='add-button'>新增</a>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
        ?>

    </div>

</body>
</html>
