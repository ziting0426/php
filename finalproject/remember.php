<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>忘記密碼</title>
        <link rel="stylesheet" href="cssreset.css"> 
        <link rel="stylesheet" href="remember.css"> 
    </head>

    <body>

        <div class="head0">
        <div class="head"> 
        <div class="avater-frame1"></div>
        <div class="word0">Go With Me</div>
        </div></div> 
        <div class="place1"></div>

        <form action="remember.php" method="post">
        <div class="word1">忘記密碼</div>

        <div class="word2">請輸入註冊的電子信箱</div>
        <div class="place2">
        <input class="input1" type="email" placeholder="email" name="uEmail" size="30" required /><br>
        </div>
        
        <div class="word2">我們將發送臨時密碼給您<br></div>
        <div class="place3">
        <input class="input3" type="submit" value="送出"></div>

        <?php
            //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
            //Load Composer's autoloader
            require 'mail/Exception.php';
            require 'mail/PHPMailer.php';
            require 'mail/SMTP.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["uEmail"];
                echo $email."用戶您好<br>";
                $link = @mysqli_connect('localhost','a1113306','3306','gowithme');
                $SQL_Email = "SELECT * FROM member WHERE email='$email'";
                $result = mysqli_query($link, $SQL_Email);


                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $userID = $row["No"];
                   
                        //Create an instance; passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->SMTPDebug = false;                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'gowithmeadm@gmail.com';                     //SMTP username
                            $mail->Password   = 'eewt kkwf gyfj nrvx';                               //SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                            $mail->CharSet='utf-8'; //主旨中文就不會亂碼
                       
                            //Recipients
                            $mail->setFrom('gowithmeadm@gmail.com', 'Mailer');  //誰寄
                            $mail->addAddress($email, 'User');     //Add a 收件者
                            $mail->addReplyTo('gowithmeadm@gmail.com', 'Information');
                            $mail->isHTML(true);               //Set email format to HTML
                           
                            function generateRandomPassword($length = 8) {
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //建立密碼庫字串集
                                $charactersLength = strlen($characters); //計算密碼庫字串集的長度
                                $randomPassword = '';
                                for ($i = 0; $i < $length; $i++) { //挑length個
                                    $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
                                }
                                return $randomPassword;
                            }
                   
                            $randomPassword = generateRandomPassword(); // 使用上述方法生成隨機密碼
                   
                            $SQL_UpdatePassword = "UPDATE member SET Password='$randomPassword' WHERE No=$userID";
                            //更新密碼
                           
                            if (mysqli_query($link, $SQL_UpdatePassword)) {
                                echo "密碼已成功更新,請至信箱查看";
                            ?>

                            <div>
                                <a href="login.php">登入頁</a>
                            </div>
                           
                            <?php
                            } else {
                                echo "密碼更新失敗: " . mysqli_error($link);
                            }
                                           
                            $mail->Subject = '臨時密碼';
                            $mail->Body    = '親愛的GoWithMe用戶您好,您新的臨時密碼為:'.$randomPassword.'建議您重新登入後盡早修改為個人密碼';
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->send();
                            //echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                               
                    }
                }
            }


           
        ?>
   
    </body>
    </html>