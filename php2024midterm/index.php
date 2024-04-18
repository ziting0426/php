<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="check.php" method="post">
        <h1>高大資管論文投稿系統</h1>
        請選擇您的角色:
        <select name="char">
            <option value="Chair">Chair</option>
            <option value="Reviewer">Reviewer</option>
            <option value="Author">Author</option>
        </select>
        <br><br><br>
        帳號:<input type="text" name="account" value = 
        <?php
            if(isset($_COOKIE["uName"])){
                echo $_COOKIE["uName"];
            }
        ?>
        >
        <br><br><br>
        密碼:<input type="password" name="password">
        <br><br><br>
        <input type="submit" value="提交">
    </form>
</body>
</html>