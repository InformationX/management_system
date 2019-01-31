<!DOCTYPE html>
<?php
mysql_connect("localhost","root","rootroot");//連結伺服器
mysql_select_db("store");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
if($_POST['name']!='' or $_POST['company']!=''){
 $name=$_POST['name'];
 $company=$_POST['company'];
 $data=mysql_query("select * from goods where cName like '%$name%' and cCompany like '%$company%'"); 
}else{
 $data=mysql_query("select * from goods");
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>商品資料管理系統</title>
</head>

<body>
<h1 align="center">商品資料管理系統 - 查詢資料</h1>
<p align="center"><a href="index.php">回主畫面</a></p>

<form action="" method="post" name="formFix" id="formFix">
	<table border="0" align="center" cellpadding="4">
		<p>
		商品名:<input name="name" type="text" id="name" value="<?php echo $name?>" />
		進貨公司:<input name="company" type="text" id="company" value="<?php echo $company?>" />
		<input type="submit" name="button" id="button" value="查尋" /></p>
	</table>
</form>

<p></p>

<table border="1" align="center" cellpadding="4">
   <tr>
    <th>編號</th>
    <th>商品名</th>
	<th>進貨日期</th>
    <th>數量</th>
    <th>單價</th>
	<th>進貨公司</th>
    <th>電子郵件</th>
    <th>電話</th>
    <th>住址</th>
  </tr>
<?php
	for($i=1;$i<=mysql_num_rows($data);$i++) {
	$rs=mysql_fetch_row($data);
?>
  <tr>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
    <td><?php echo $rs[6]?></td>
    <td><?php echo $rs[7]?></td>
    <td><?php echo $rs[8]?></td>
  </tr>
<?php
	}
?>
</table>
</body>
</html>