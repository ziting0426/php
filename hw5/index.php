<meta charset = 'utf8'>

<?php

//連接資料庫
$link = @mysqli_connect('localhost','root','Oo930426','forminfo');

if(!$link){
    die("無法開啟資料庫");
}
else{
    echo("開啟成功");
}

//資料庫語法
$SQL = "SELECT * FROM info";

//送出查詢
$result = mysqli_query($link,$SQL);

echo "<table border = '1'>";

echo "<tr>
    <td>No</td>
    <td>Name</td>
    <td>Email</td>
    <td>Address</td>
    <td>Age</td>
    <td>Gender</td>
    <td>ShirtNum</td>
    <td></td> 
    <td></td>  
    </tr>";

//結果轉換陣列，並印出
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row["No"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Address"]."</td><td>".$row["Age"]."</td><td>".$row["Gender"]."</td><td>".$row["ShirtNum"]."</td><td>修改</td><td><a href = 'del.php?No=".$row["No"]."'>刪除</a></td>";
    echo "</tr>";
}

mysqli_close($link);


?>