<!DOCTYPE html>
<?php 
include("connMysql.php");
if (!@mysqli_select_db($db_link, "store")) die("資料庫選擇失敗！");
if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
	$sql_query = "DELETE FROM `goods` WHERE `cID`=".$_POST["cID"];
	mysqli_query($db_link, $sql_query);
	//重新導向回到主畫面
	header("Location: index.php");
}
$sql_db = "SELECT * FROM `goods` WHERE `cID`=".$_GET["id"];
$result = mysqli_query($db_link, $sql_db);
$row_result=mysqli_fetch_assoc($result);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>delete</title>
</head>
<body>
<h1 align="center">商品資料管理系統 - 刪除資料</h1>
<p align="center"><a href="index.php">回主畫面</a></p>
<form action="" method="post" name="formDel" id="formDel">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>欄位</th><th>資料</th>
    </tr>
    <tr>
      <td>名稱</td><td><?php echo $row_result["cName"];?></td>
    </tr>
    <tr>
      <td>進貨日期</td><td><?php echo $row_result["cDay"];?></td>
    </tr>
	<tr>
      <td>數量</td><td><?php echo $row_result["cAmount"];?></td>
    </tr>
	<tr>
      <td>單價</td><td><?php echo $row_result["cPrice"];?></td>
    </tr>
	<tr>
      <td>進貨公司</td><td><?php echo $row_result["cCompany"];?></td>
    </tr>
    <tr>
      <td>電子郵件</td><td><?php echo $row_result["cEmail"];?></td>
    </tr>
    <tr>
      <td>電話</td><td><?php echo $row_result["cPhone"];?></td>
    </tr>
    <tr>
      <td>住址</td><td><?php echo $row_result["cAddr"];?></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="cID" type="hidden" value="<?php echo $row_result["cID"];?>">
      <input name="action" type="hidden" value="delete">
      <input type="submit" name="button" id="button" value="確定刪除這筆資料嗎？">
      </td>
    </tr>
  </table>
</form>
</body>
</html>