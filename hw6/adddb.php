<meta charset = "utf-8">


<?php
    $sName = $_POST["sName"];
    $sDept = $_POST["sDept"];
    $inputFile = $_FILES["inputFile"];

    //連接資料庫
    $link = @mysqli_connect( //加@->不要顯示錯誤訊息
        'localhost',  // MySQL主機名稱 
        'root',       // 使用者名稱 
        'Oo930426',  // 密碼
        'school');  // 預設使用的資料庫名稱

    $ext = pathinfo($_FILES["inputFile"]["name"], PATHINFO_EXTENSION);
    //讓檔名不要重複
    $upname = time().".".$ext;
    echo $upname;

    //SQL語法
    $SQL = "INSERT INTO info(Name, Dept, Img) VALUES('$sName','$sDept','$upname')";

    //送出查詢
    if($result = mysqli_query($link, $SQL)){
        echo "<br/>新增成功";
    }
    echo "<br/><a href='index.php'>查看資料庫資料</a><br/>";
?>

<?php
    echo "檔案名稱: ".$_FILES["inputFile"]["name"]."<br/>";
    echo "暫存檔名: ".$_FILES["inputFile"]["tmp_name"]."<br/>";
    echo "檔案尺寸: ".$_FILES["inputFile"]["size"]."<br/>";
    echo "檔案種類: ".$_FILES["inputFile"]["type"]."<hr/>";

    if(copy($_FILES["inputFile"]["tmp_name"],$upname)){
        echo "檔案上傳成功";
        unlink($_FILES["inputFile"]["tmp_name"]);
    }
?>

