<?php

$link = @mysqli_connect('localhost','a1113306','3306','gowithme');
if (!$link) {
    die("無法連接資料庫: " . mysqli_connect_error());
}

// 準備 SQL 查詢語句
$sql_attraction = "SELECT attractionName, COUNT(*) as count FROM history GROUP BY attractionName";
$sql_gender = "SELECT gender, COUNT(*) as count FROM member GROUP BY gender";

$result_attraction = mysqli_query($link, $sql_attraction);
$result_gender = mysqli_query($link, $sql_gender);

if (!$result_attraction || !$result_gender) {
    die("查詢失敗: " . mysqli_error($link));
}

// 準備用於 Google 圖表的數據陣列
$data_attraction = array();
$data_attraction[] = ['景點名稱', '出現次數'];

$data_gender = array();
$data_gender[] = ['Gender', 'Count'];

// 將景點資料庫中的每一行轉換為 Google 圖表的數據格式
while ($row = mysqli_fetch_assoc($result_attraction)) {
    $data_attraction[] = [$row['attractionName'], (int)$row['count']];
}

// 將性別資料庫中的每一行轉換為 Google 圖表的數據格式
while ($row = mysqli_fetch_assoc($result_gender)) {
    $data_gender[] = [$row["gender"], (int)$row["count"]];
}

// 關閉資料庫連接
mysqli_close($link);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="data.css">

    <div class="head0">
    <div class="head">  

    <div class="word0">Go With Me</div>

    <div class="info">
        <a href="logout.php" class="a2">登出</a>
        <a href="cart.php" class="avater-frame1"></a>
        <a href="personInfo.php" class="avater-frame2"></a>
    </div>

    <a href="index_Taipei.php" class="a1">台北</a>
    <a href="index_Taichung.php" class="a1">台中</a>
    <a href="index_Kaohsiung.php" class="a1">高雄</a>
    <div class="place1"></div>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      // 繪製景點熱門程度圖表
      var data_attraction = google.visualization.arrayToDataTable(<?php echo json_encode($data_attraction); ?>);
      var options_attraction = {
        chart: {
          title: '景點熱門程度',
          subtitle: '出現次數'
        },
        legend: { position: 'none' },
        bars: 'horizontal',
        axes: {
          x: {
            0: { side: 'top', label: '出現次數'} // Top x-axis.
          }
        },
        bar: { groupWidth: "90%" }
      };
      var chart_attraction = new google.charts.Bar(document.getElementById('top_x_div'));
      chart_attraction.draw(data_attraction, google.charts.Bar.convertOptions(options_attraction));

      // 繪製性別分佈圓餅圖
      var data_gender = google.visualization.arrayToDataTable(<?php echo json_encode($data_gender); ?>);
      var options_gender = {
        title: '性別分佈'
      };
      var chart_gender = new google.visualization.PieChart(document.getElementById('piechart'));
      chart_gender.draw(data_gender, options_gender);
    }
  </script>
</head>

<body>


  <div class="chart-container">
    <h2 class="chart-title">數據統整</h2>
    <div id="top_x_div" style="height: 400px;"></div>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </div>
  <div class="center"><a href="index_admin.php" class="button">新增景點</a></div>
  
</body>
</html>
