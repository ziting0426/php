<meta charset = 'utf8'>

<?php

$sNo = $_GET["No"];

$link = @mysqli_connect('localhost','root','Oo930426','forminfo');

$SQL = "DELETE FROM info WHERE No = '$sNo'";

$result = mysqli_query($link,$SQL);

if($result){
    echo "刪除成功";
}
else{
    echo "刪除失敗";
}

echo "<br><br><a href = 'index.php'>查看目前資料庫資料</a>";

?>