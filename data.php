<?php 
	header("Content-Type: text/html; charset=utf-8");
	include "connMysql.php";
	//$seldb = @mysqli_select_db($db_name);
	//if (!$seldb) die("資料庫選擇失敗！");
	$sql_query = "SELECT * FROM `details`";
	$result = mysqli_query($db_link, $sql_query);
	$total_records = mysqli_num_rows($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</script>
<title>收支管理系統</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<input id="myInput" type="text" placeholder="Search..">
<h1 align="center">收支管理系統</h1>
<p align="center">目前收支資料筆數：<?php echo $total_records;?>
<p><a href="add_income.php">新增收入資料</a>。</p>
<p><a href="add_outcome.php">新增支出資料</a>。</p>
<p><a href="month.php">當月收支狀況</a>。</p>

<table class="dataTable">
  <!-- 表格表頭 -->
  <tr>
    <th>年份</th>
    <th>月份</th>
    <th>日</th>
    <th>收入 / 支出</th>
    <th>金額</th>
    <th>收 / 付款方式</th>
    <th>備註</th>
    <th>功能</th>
  </tr>
  <!-- 資料內容 -->
<?php
	while($row_result=mysqli_fetch_assoc($result)){
		echo "<tr>";
		//echo "<td>".$row_result["sID"]."</td>";
		echo "<td>".$row_result["sYear"]."</td>";
		echo "<td>".$row_result["sMonth"]."</td>";
		echo "<td>".$row_result["sDay"]."</td>";
		echo "<td>".$row_result["sIn/Out"]."</td>";
		echo "<td>".$row_result["sCount"]."</td>";
		echo "<td>".$row_result["sWay"]."</td>";
        echo "<td>".$row_result["sPS"]."</td>";
		echo "<td><a href='update.php?id=".$row_result["sID"]."'><img src=\"icon-update.png\" title=\"修改\" /></a> &nbsp;&nbsp;";
		echo "<a href='delete.php?id=".$row_result["sID"]."'><img src=\"trash.png\" title=\"刪除\" /></a></td>";
		echo "</tr>";
	}
?>
</table>
</body>
</html>