<meta charset = "utf-8">

<?php

//連接資料庫
$link = @mysqli_connect('localhost','root','Oo930426','school');

if(!$link){
    die("無法開啟資料庫<br>");
}
else{
    echo "成功開啟資料庫<br>";
}

//SQL語法
$SQL = "SELECT * FROM Info";

$result = mysqli_query($link,$SQL);
echo "<table border='1'>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row["No"]."</td><td>".$row["Name"]."</td><td>".$row["Dept"]."</td><td><img src='{$row['Img']}'></td><td><a href='del.php?No=".$row["No"]."'>刪除</a></td><td><a href='update.php?No=".$row["No"]."'>修改</a></td>";
    echo "</tr>";
    
}
echo "</table>";

?>