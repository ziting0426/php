<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資管晚會報名表</title>
</head>
<body>
    <form action="add.php" method="post">
        <fieldset>
            <legend>個人資料</legend>
            <br>
            <label for="name">名字:</label>
            <input type="text" name="name" placeholder="請輸入名字" id="name" required>
            <br>
            <br>
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="請輸入email" id="email" required>
            <br>
            <br>
            <label for="address">地址:</label>
            <textarea name="address" id="address" placeholder="請輸入居住地" cols="30" rows="2"></textarea>
            <br>
            <br>
            <label for="age">年齡:</label>
            <input type="number" name="age" placeholder="請輸入年齡" id="age">
            <br>
            <br>
            <label for="male">性別:</label>
            <input type="radio" name="gender" value="男" id="male">
            <label for="male">男</label>
            <input type="radio" name="gender" value="女" id="female">
            <label for="female">女</label>
            <br>
            <br>
        </fieldset>
        <br>
        <br>
        <fieldset>
            <legend>活動相關資訊</legend>
            <br>
            <br>
            <label for="shirtNum">衣服件數:</label>
            <input type="number" name="shirtNum" placeholder="衣服件數" id="shirtNum">
            <br>
            <br>
        </fieldset>
        <br>
        <br>
        <input type="submit" value="送出報名">
        <input type="reset" value="清除資料">
    </form>
</body>
</html>