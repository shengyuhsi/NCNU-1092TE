<?php 
include("connMysql.php");
//if (!@mysqli_select_db($db_name)) die("資料庫選擇失敗！");
if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
	$sql_query = "DELETE FROM `details` WHERE `sID`=".$_POST["sID"];
	mysqli_query($db_link,$sql_query);
	//重新導向回到主畫面
	header("Location: data.php");
}
$sql_db = "SELECT * FROM `details` WHERE `sID`=".$_GET["id"];
$result = mysqli_query($db_link, $sql_db);
$row_result=mysqli_fetch_assoc($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>收支管理系統</title>
</head>
<body>
<h1 align="center">收支管理系統 - 刪除資料</h1>
<p align="center"><a href="data.php">回主畫面</a></p>
<form action="" method="post" name="formDel" id="formDel">
  <table border="1" align="center" cellpadding="4">
    <tr>
        <th>類別</th>
        <th>資料</th>
    </tr>
    <tr>
      <td>年份</td><td><?php echo $row_result["sYear"];?></td>
    </tr>
    <tr>
      <td>月份</td>
      <td>
        <?php
            echo $row_result["sMonth"];
        ?>
      </td>
    </tr>
    <tr>
      <td>日期</td><td><?php echo $row_result["sDay"];?></td>
    </tr>
    <tr>
      <td>收入/支出</td><td><input type="text" name="sIn/Out" id="sIn/Out"></td>
    </tr>
    <tr>
      <td>金額</td><td><?php echo $row_result["sCount"];?></td>
    </tr>
    <tr>
      <td>交易方式</td><td><?php echo $row_result["sWay"];?></td>
    </tr>
    <tr>
      <td>備註</td><td><?php echo $row_result["sPS"];?></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="sID" type="hidden" value="<?php echo $row_result["sID"];?>">
      <input name="action" type="hidden" value="delete">
      <input type="submit" name="button" id="button" value="確定刪除這筆資料嗎？">
      </td>
    </tr>
  </table>
</form>
</body>
</html>