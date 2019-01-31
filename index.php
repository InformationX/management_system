<!DOCTYPE HTML>
<?php 
	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$seldb = @mysqli_select_db($db_link, "store");
	if (!$seldb) die("資料庫選擇失敗！");
	
	//預設每頁筆數
	$pageRow_records = 4;
	//預設頁數
	$num_pages = 1;
	//若已經有翻頁，將頁數更新
	if (isset($_GET['page'])) {
	  $num_pages = $_GET['page'];
	}
	//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
	$startRow_records = ($num_pages -1) * $pageRow_records;
	//未加限制顯示筆數的SQL敘述句
	$sql_query = "SELECT * FROM `goods`";
	//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
	$sql_query_limit = $sql_query." LIMIT ".$startRow_records.", ".$pageRow_records;
	//以加上限制顯示筆數的SQL敘述句查詢資料到 $result 中
	$result = mysqli_query($db_link, $sql_query_limit);
	//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_result 中
	$all_result = mysqli_query($db_link, $sql_query);
	//計算總筆數
	$total_records = mysqli_num_rows($all_result);
	//計算總頁數=(總筆數/每頁筆數)後無條件進位。
	$total_pages = ceil($total_records/$pageRow_records);
?>

<html>

<head>
	<title>index</title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
</head>

<body>
<div class="wrap">
	<div class="header">
		<div class="logo"><img src="img/logo.png" /></div>
		<div class="clear"></div>
	</div>

<div class="content">
    <div class="sidebar">
    	<div class="side">
            <h3>目前資料筆數:<?php echo $total_records;?></h3>
            <ul>
                <li><a href="add.php" target="iframe_a">新增商品資料</a></li>
                <li><a href="select.php">查詢商品資料</a></li>
            </ul>
        </div>
    </div>
	
	<div class="main">
	<?php
	while($row_result=mysqli_fetch_assoc($result)){
	?>
        <div class="grid">
        	<div class="prev"><img src="img/toy.jpg" /></div>
            <ul class="details">
                <li>名稱:<?php echo $row_result["cName"]?></li>
                <li>數量:<?php echo $row_result["cAmount"]?></li>
                <li>單價:<?php echo $row_result["cPrice"]?></li>
				<li><?php echo "<a href='update.php?id=".$row_result["cID"]."'>修改</a>"?></li>
				<li><?php echo "<a href='delete.php?id=".$row_result["cID"]."'>刪除</a>"?></li>
            </ul>
            <div class="clear"></div>
        </div>
	<?php 
	}
	?>
    </div>
	
	<div class="grid" style="margin-left:425px; background-color:#FFAC55;">
	<tr>
		<?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
		<td><a href="index.php?page=1">第一頁</a></td>
		<td><a href="index.php?page=<?php echo $num_pages-1;?>">上一頁</a></td>
		<?php } ?>
		<?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
		<td><a href="index.php?page=<?php echo $num_pages+1;?>">下一頁</a></td>
		<td><a href="index.php?page=<?php echo $total_pages;?>">最後頁</a></td>
		<?php } ?>
	</tr>
	
	
	<tr>
		<td>
		  頁數：
		  <?php
		  for($i=1;$i<=$total_pages;$i++){
			  if($i==$num_pages){
				  echo $i." ";
			  }else{
				  echo "<a href=\"index.php?page=$i\">$i</a> ";
			  }
		  }
		  ?>
		</td>
	</tr>
	</div>
	
<div class="clear"></div>
</div>
</div>
<!--------------------------------------->
<div class="wrap">
<div id="bg_footer">	
    <div class="clear"></div>
    <div class="copy">Copyright &copy; 2015.Company name All rights reserved.</div>
</div>
</div>
</body>
</html>
