<?php
    session_start();
    $_SESSION["check"]="guest";
   
    date_default_timezone_set("Asia/Taipei");
    echo date("Y/m/d h:i:sa")."<br>";
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="cssreset.css"> 
        <link rel="stylesheet" href="login.css"> 
    </head>
    <body>

    <div class="head0">
    <div class="head"> 
    <div class="avater-frame1"></div>
        <div class="word0">Go With Me</div>
    </div> 
    </div>

        <div class="place1">
        <div class="word1">
        登入 Go With Me 個人帳戶<br></div>
        <div class="word2">
        制定行程、揪旅伴 再也不用愁</div>
        </div>

        <form action="login.php" method="post">

            <div class="place2">
            <div class="word3">
            信箱</div><input class="input1" type="email" name="LoginEmail" value="<?php echo isset($_COOKIE["userName"]) ? $_COOKIE["userName"] : ''; ?>"><br>
            </div>
            <div class="place2">
            <div class="word3">
            密碼</div><input class="input1" type="password" name="LoginPassword"><br>
            </div>
            <div class="place3">
            <input class="input2" type="submit" value="登入">
            </div>

            <hr class="hr1"></hr>
            <div class="word4">或使用以下選項</div>

            
            <a href="signup.php">註冊帳號</a>
            <a href="remember.php">忘記密碼</a>
            <div class="place1"></div>

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $LoginEmail=$_POST["LoginEmail"];
            $LoginPassword=$_POST["LoginPassword"];


            $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
            if(!$link){
                die("無法開啟資料庫<br>");
            }
            else{
                echo "成功開啟資料庫<br>";
            }

            $SQL_Email = "SELECT * FROM member WHERE email='$LoginEmail' AND password='$LoginPassword'";
            $result_Email = mysqli_query($link, $SQL_Email);
            $inputEmail = $row['email'];

            if(mysqli_num_rows($result_Email) === 1){
                $row = mysqli_fetch_assoc($result_Email);
                //$inputEmail = $row['email'];
                if($LoginEmail=="gowithmeadm@gmail.com"){
                    $_SESSION["check"]="admin";
                    $_SESSION["memberId"] = $row["No"]; // 儲存會員 ID
                    echo '<script>';
                    echo 'alert("' . $LoginEmail . ' 登入成功！請開始享受你的旅程吧!");';
                    echo 'window.location.href = "index_admin.php";'; // 在 alert 顯示之後，將用戶重定向到 index_admin.php
                    echo '</script>';
                    exit; // 跳出程式碼執行
                } else {
                    $_SESSION["check"]="user";
                    $_SESSION["memberId"] = $row["No"]; // 儲存會員 ID
                    echo '<script>';
                    echo 'alert("' . $LoginEmail . ' 登入成功！請開始享受你的旅程吧!");';
                    echo 'window.location.href = "index_user.php";'; // 在 alert 顯示之後，將用戶重定向到 index_user.php
                    echo '</script>';
                    exit; // 跳出程式碼執行
                }
            } else {
                echo '<script>';
                echo 'alert("登入失敗！");';
                echo '</script>';
            }
            
            
        }
        ?>
        
    </body>
    </html>
