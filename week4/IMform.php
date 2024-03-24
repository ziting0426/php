<?php
    echo "請確認報名資訊:</br></br>";
    $name = $_POST["name"];
    echo "名字:".$name."</br></br>";
    $email = $_POST["email"];
    echo "email:".$email."</br></br>";
    $pwd = $_POST["pwd"];
    echo "密碼:".$pwd."</br></br>";
    $address = $_POST["address"];
    echo "地址:".$address."</br></br>";
    $age = $_POST["age"];
    echo "年齡:".$age."</br></br>";
    $date = $_POST["date"];
    echo "出生日期:".$date."</br></br>";
    $gender = $_POST["gender"];
    echo "性別:".$gender."</br></br>";
    $time = $_POST["time"];
    echo "到場時間:".$time."</br></br>";
    $shirtNum = $_POST["shirtNum"];
    echo "衣服件數:".$shirtNum."</br></br>";
    $size = $_POST["size"];
    $count = count($size);
    echo "衣服尺寸:";
    for($i=0;$i<$count;$i++){
        if($i<$count-1){
            echo $size[$i].",";
        }
        else{
            echo $size[$i];
        }
    }
?>