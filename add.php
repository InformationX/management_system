<!DOCTYPE html>
<?php 
if(isset($_POST["action"])&&($_POST["action"]=="add")){
	include("connMysql.php");
	if (!@mysqli_select_db($db_link, "store")) die("資料庫選擇失敗！");
	$sql_query = "INSERT INTO `goods` (`cName` ,`cDay` ,`cAmount` ,`cPrice` , `cCompany` , `cEmail` ,`cPhone` ,`cAddr`) VALUES (";
	$sql_query .= "'".$_POST["cName"]."',";
	$sql_query .= "'".$_POST["cDay"]."',";
	$sql_query .= "'".$_POST["cAmount"]."',";
	$sql_query .= "'".$_POST["cPrice"]."',";
	$sql_query .= "'".$_POST["cCompany"]."',";
	$sql_query .= "'".$_POST["cEmail"]."',";
	$sql_query .= "'".$_POST["cPhone"]."',";
	$sql_query .= "'".$_POST["cAddr"]."')";
	mysqli_query($db_link, $sql_query);
	//重新導向回到主畫面
	header("Location: index.php");
}	
?>
<html>
<head>
	<meta charset="utf-8">
	<title>add</title>
</head>
<body>
<h1 align="center">商品資料管理系統 - 新增資料</h1>
<p align="center"><a href="index.php">回主畫面</a></p>
<form action="" method="post" name="formAdd" id="formAdd">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>欄位</th><th>資料</th>
    </tr>
    <tr>
      <td>名稱</td><td><input type="text" name="cName" id="cName"></td>
    </tr>
    <tr>
      <td>進貨日期</td><td><input type="text" name="cDay" id="cDay"></td>
    </tr>
	 <tr>
      <td>數量</td><td><input type="text" name="cAmount" id="cAmount"></td>
    </tr>
	 <tr>
      <td>單價</td><td><input type="text" name="cPrice" id="cPrice"></td>
    </tr>
	<tr>
      <td>進貨公司</td><td><input type="text" name="cCompany" id="cCompany"></td>
    </tr>
    <tr>
      <td>電子郵件</td><td><input type="text" name="cEmail" id="cEmail"></td>
    </tr>
    <tr>
      <td>電話</td><td><input type="text" name="cPhone" id="cPhone"></td>
    </tr>
    <tr>
      <td>住址</td><td><input name="cAddr" type="text" id="cAddr" size="40"></td>
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