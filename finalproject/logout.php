<?php
    session_start();
    session_destroy();
    echo "即將跳轉首頁";
    header("Refresh:3;url=index_guest.php");
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>正在重新導向...</title>
    <style>
        /* 訊息的樣式 */
        .message {
            font-size: 18px;
            color: #333;
            text-align: center;
            margin-top: 50px;
        }

        /* 連結的樣式 */
        .link {
            color: #007bff;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="message">
        即將跳轉首頁，請稍候...
        <br>
        如果未跳轉，請點擊<a href="index_guest.php" class="link">這裡</a>。
    </div>
</body>
</html>
