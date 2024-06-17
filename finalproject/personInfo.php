<?php
session_start();
if($_SESSION["check"] != "user"){
    header("Location: login.php");
    exit;
}

$memberId = $_SESSION["memberId"];
$link = @mysqli_connect('localhost','a1113306','3306','gowithme');
if (!$link) {
    die("無法連接資料庫: " . mysqli_connect_error());
}

$sql = "SELECT Email, Password, gender FROM member WHERE No = $memberId";
$result = mysqli_query($link, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $email = $row["Email"];
    $password = $row["Password"];
    $gender = $row["gender"];
} else {
    echo "未能獲取個人資料";
    exit;
}

mysqli_close($link);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>個人資料</title>
    <link rel="stylesheet" href="cssreset.css"> 
    <link rel="stylesheet" href="personInfo.css">  
</head>

<body>

    <div class="head0">
    <div class="head">  
        <div class="avater-frame1"></div>
        <div class="word0">Go With Me</div>
    </div> 
    </div>
    <div class="place1"></div>


    <div class="word3">個人資料<br></div>
   
    <form action="update_profile.php" method="post">

    <div class="place1">
    <div class="word4">
    信箱: </div><input class="input1" type="email" name="Email" value="<?php echo $email; ?>"><br>
    </div>

    <div class="place1">
    <div class="word4">
    密碼: </div><input class="input1" type="password" name="Password" value="<?php echo $password; ?>"><br>
    </div>

    <div class="place1">

    <div class="word4">
    性別:</div>

        <select name="gender">
            <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if($gender == 'Other') echo 'selected'; ?>>Other</option>
        </select><br>

    </div>

    <div class="place2">
        <input class="input3" type="submit" value="更新資料">
    </div>

    </form>

    <a href="index_user.php">回首頁</a>

</body>
</html>
