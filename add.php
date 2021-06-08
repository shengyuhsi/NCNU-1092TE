<?php 
if(isset($_POST["action"])&&($_POST["action"]=="add")){
	include("connMysql.php");
	//if (!@mysqli_select_db($db_name)) die("資料庫選擇失敗！");
	$sql_query = "INSERT INTO `details` (`sYear` ,`sMonth` ,`sDay` ,`sIn/Out` ,`sCount` ,`sWay` , `sPS`) VALUES (";
	$sql_query .= "'".$_POST["sYear"]."',";
	$sql_query .= "'".$_POST["sMonth"]."',";
	$sql_query .= "'".$_POST["sDay"]."',";
	$sql_query .= "'".$_POST["sIn/Out"]."',";
	$sql_query .= "'".$_POST["sCount"]."',";
	$sql_query .= "'".$_POST["sWay"]."',";
    $sql_query .= "'".$_POST["sPS"]."')";
	mysqli_query($db_link, $sql_query);
	//重新導向回到主畫面
	header("Location: data.php");
}	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增收支資料</title>
</head>
<body>
<h1 align="center">新增一筆收支資料</h1>
<p align="center"><a href="data.php">回主畫面</a></p>
<form action="" method="post" name="formAdd" id="formAdd">
    <table border="1" align="center" cellpadding="4">
    <tr>
        <th>類別</th>
        <th>資料</th>
    </tr>
        <tr>
            <td>年份</td><td>
            <select id="sYear" name="sYear">
            <option>2020</option>
            <option selected>2021</option>
            <option>2022</option>
            </select></td>
        </tr>
        <tr>
            <td>月份</td><td>
            <select id="sMonth" name="sMonth">
            <option>01</option>
            <option selected>02</option>
            <option>03</option>
            </select></td>
        </tr>
        <tr>
            <td>日期</td>
            <td>
                <input type="text" name="sDay" id="sDay">
            </td>
        </tr>
        <tr>
            <td>收入/支出</td><td>
            <input type="radio" name="sIn/Out" id="radio" value="收入" checked>收入
            <input type="radio" name="sIn/Out" id="radio" value="支出">支出
            </td>
        </tr>
        <tr>
            <td>金額</td>
            <td>
                <input type="text" name="sCount" id="sCount">
            </td>
        </tr>
        <tr>
            <td>交易方式</td><td>
                <input type="radio" name="sWay" id="radio" value="現金" checked>現金
                <input type="radio" name="sWay" id="radio" value="信用卡">信用卡
                <input type="radio" name="sWay" id="radio" value="行動支付">行動支付
            </td>
        </tr>
        <tr>
            <td>備註</td><td><input type="text" name="sPS" id="sPS"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <input name="action" type="hidden" value="add">
            <input type="submit" name="button" id="button" value="新增資料">
            <input type="reset" name="button2" id="button2" value="重新填寫">
            </td>
        </tr>
  </table>
</form>
</body>
</html>