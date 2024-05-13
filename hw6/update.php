<meta charset='utf8'>
<?php
$No=$_GET["No"];

//連接資料庫
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    'Oo930426',  // 密碼
    'school');  // 預設使用的資料庫名稱
//SQL語法
$SQL="SELECT * FROM Info WHERE No='$No'";
if($result = mysqli_query($link, $SQL)){
    $row=mysqli_fetch_assoc($result);
    if(isset($row["Name"]) && isset($row["Dept"])) {
        $Name = $row["Name"];
        $Department = $row["Dept"];
    }
}
?>
<form action="updatecheck.php" method="post">
編號:<?php echo $No ?><input type="hidden" name="uNo" value="<?php echo $No ?>"><br/>
姓名:<input type="text" name="uName" value="<?php echo $Name ?>"><br/>
系所:<input type="text" name="uDept" value="<?php echo $Department ?>"><br/>
<input type="submit">
</form>