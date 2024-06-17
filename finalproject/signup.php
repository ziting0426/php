<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>註冊頁面</title>

        <link rel="stylesheet" href="cssreset.css">  
        <link rel="stylesheet" href="signup.css">  
    </head>
    <body>

        <div class="head0">
        <div class="head"> 
        <div class="avater-frame1"></div>
        <div class="word0">Go With Me</div>
        </div>  
        </div>

        <div class="word1">
        註冊 Go With Me 個人帳戶<br></div>
        <div class="word2">
        制定行程、揪旅伴 再也不用愁</div>

        <form action="signup.php" method="post">
            <div class="word3">填寫會員註冊資料<br></div>
            
            <div class="place1">
            <div class="word4">
            常用信箱: </div><input class="input1" type="email" placeholder="&ensp;未來帳號名" name="uEmail" required><br>
            </div>
            
            <div class="place1">
            <div class="word4">
            密&emsp;&emsp;碼:</div><input class="input1" type="password" name="uPassword" required="required"><br>
            </div>

            <div class="place1">
            <div class="word4">
            確認密碼:</div><input class="input1" type="password" name="uPasswordCheck" required="required"><br>
            </div>
            
            <div class="place1">
            <div class="word4">
            性&emsp;&emsp;別:</div><input class="input2" type="radio" name="uGender" value="male"><div class="word4">男</div>
                                   <input class="input2" type="radio" name="uGender" value="female" checked="checked"><div class="word4">女</div><br>
            </div>  

            <div class="place2">
            <input class="input3" type="submit" value="註冊">
            </div>
        </form>
             
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Email=$_POST["uEmail"];
            $Password=$_POST["uPassword"];
            $PasswordCheck=$_POST["uPasswordCheck"];
            $Gender=$_POST["uGender"];
            $link = @mysqli_connect('localhost','root','001ac','phpclass');
            //用來執行 SQL 查詢的 PHP 語句，並將查詢結果存儲在 $result 變數中
            $SQL_Email = "SELECT * FROM member WHERE email='$Email'";
            $result_Email = mysqli_query($link, $SQL_Email);
            $SQL_Password = "SELECT * FROM member WHERE password='$Password'";
            $result_Password = mysqli_query($link, $SQL_Password);


            if (mysqli_num_rows($result_Email) > 0) {
                echo '<script>';
                echo 'alert("' . $LoginEmail . ' 註冊失敗，該郵箱已被註冊");';
                echo '</script>';
            }else if($Password!==$PasswordCheck){
                echo '<script>';
                echo 'alert("' . $LoginEmail . ' 註冊失敗，密碼輸入不一致");';
                echo '</script>';
            }else if(mysqli_num_rows($result_Password) > 0){
                echo '<script>';
                echo 'alert("' . $LoginEmail . ' 註冊失敗，密碼已有人佔用");';
                echo '</script>';
            }else {
                $insert_sql = "INSERT INTO member (email, password, gender) VALUES ('$Email', '$Password', '$Gender')";
                if (mysqli_query($link, $insert_sql)) {
                    echo '<script>';
                    echo 'alert("註冊成功 將跳轉至登入頁");';
                    echo '</script>';
                    header("Refresh:0;url=login.php");
                } else {
                    echo '<script>';
                    echo 'alert("' . $LoginEmail . ' 註冊失敗，請稍後再試");';
                    echo '</script>';
                }
            }
           
            mysqli_close($link);

        }
        ?>

        </div>
    </body>
    </html>
