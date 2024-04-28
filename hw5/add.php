<meta charset = 'utf8'>
<?php

$Name = $_POST["name"];
$Email = $_POST["email"];
$Address = $_POST["address"];
$Age = $_POST["age"];
$Gender = $_POST["gender"];
$ShirtNum = $_POST["shirtNum"];

$link = @mysqli_connect('localhost','root','Oo930426','forminfo');

$SQL = "INSERT INTO info(Name,Email,Address,Age,Gender,ShirtNum) VALUES ('$Name','$Email','$Address','$Age','$Gender','$ShirtNum')";

$result = mysqli_query($link,$SQL);

if($result){
    echo "新增成功";
}else{
    echo "新增失敗";
}
echo "<br><br><a href = 'index.php'>查看目前資料庫資料</a>"

?>