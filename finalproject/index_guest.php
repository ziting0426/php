<?php
    session_start();
    $_SESSION["check"] = "guest";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="cssreset.css">  
    <link rel="stylesheet" href="index_guest.css"> 
</head>

<body>
    
    <div class="head0">
    <div class="head"> 

    <div class="info">
        <div class="word1">一起參與大家的討論吧</div>
        <a href="login.php" class="a2">登入</a>
    </div>

    <div class="word0">Go With Me</div>

    <table>
	    <tr>
		    <th>隨時</th>
		    <td>隨地</td>
		    <td>隨心所欲</td>
		    <td class="td2"><a href="login.php" class="a3">GO WITH ME</a></td>
	    </tr>
    </table>
    <a href="index_Taipei.php" class="a1">台北</a>
    <a href="index_Taichung.php" class="a1">台中</a>
    <a href="index_Kaohsiung.php" class="a1">高雄</a>

    </div>
    </div>
    <div class="place1"></div>
    
    
    <div class="word2">最受歡迎</div>
    <div class="word3">全台網友都在+1的好評行程都在這!</div>
    
    <div class="content">
            <?php
    $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
                if(!$link){
                    die("資料庫連接失敗: " . mysqli_connect_error());
                }
                //SQL語法
                $SQL = "SELECT * FROM attraction";

                $result = mysqli_query($link,$SQL);

                while($row = mysqli_fetch_assoc($result)){
                    echo $row["attractionName"];
                    echo "</br>";
                }

                echo "...";
                echo "</br></br></br>";
            ?>
    </div>
</body>
</html>
