<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="cssreset.css">  
        <link rel="stylesheet" href="cart.css">  

        <script type="text/javascript">
        function goBackTwice() {
            window.history.go(-2);
        }
        </script>
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

    <input class='input2' type ='button' onclick='goBackTwice()' value='返回上頁繼續添加行程'></input>
    <a href="post_to_forum.php" class="a1">將行程發布到論壇</a>
    <a href="save_to_history.php" class="a1">將行程存入歷史紀錄</a>
    <a href="index_user.php" class="a1">首頁</a>



    <?php
    session_start();
    if($_SESSION["check"] != "user"){
        header("Location: login.php");
    }

    // 登入的會員 memberId
    $memberId = $_SESSION["memberId"];

    // 連接資料庫
    $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
    if (!$link) {
        die("無法連接資料庫: " . mysqli_connect_error());
    }

    // 查詢該會員的購物車內容
    $sql = "SELECT c.cartId, a.attractionName
            FROM cart c
            INNER JOIN attraction a ON c.attractionName = a.attractionName
            WHERE c.memberId = $memberId";
    $result = mysqli_query($link, $sql);

    echo "<div class='word1'><購物車></br></br>您目前的行程有:</br></br></div>";

    // 結果轉換陣列，並印出
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='container'>";
        echo "<div class='place'>";
        echo $row["attractionName"];

        echo "<form action='delete_from_cart.php' method='post' style='display:inline;'>
              <input type='hidden' name='cartId' class='location' value='". $row["cartId"] . "'>
              <input type='submit' class='btn' value='刪除'>
              </form>";
        echo "</div>";
        echo "</div>";
        echo "</br></br>";
    }

    mysqli_close($link);

    ?>

 
    </body>
    </html>






