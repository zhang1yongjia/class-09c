<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<script src="../js/jQuery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>书籍添加</title>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-light">
		<a href="#" class="navbar-brand">图书系统</a>
		
		<button type="button" class="navbar-toggler" data-toggle = "collapse" data-target="#nb">
			<span class="navbar-toggler-icon text-dark"></span>
		</button>
		
		<div class="navbar-collapse collapse" id="nb">
			<?php
			include("top.php");
		?>
		</div>
		
		<span class="navbar-brand">你好,
		<?php
			session_start();//开启session功能
			echo $_SESSION["username"];
		?></span>
	</nav>
	
	<div id="msg">
		<h1>添加书籍</h1>
		<form method="post" action="add_book2.php">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">图书名</span>
				</div>
				<input type="text" name="bname" class="form-control" name="bname" placeholder="请输入书籍姓名" />
			</div>
				<?php
				include("../conn/conn.php");
				include("../tools.php");
				$sql = "select * from book_type";
				$result = mysqli_query($conn,$sql);
				$number = mysqli_num_rows($result);
				for($i=0;$i<$number;$i++){
					$row[][] = mysqli_fetch_array($result);
				}
				$json = json_encode($row);
				
				echo "<script>";
				echo "var row = $json;";
				echo "</script>";
				?>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">图书类型</span>
				</div>
				<select name="choice" class="form-select form-control">
				</select>
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">作者</span>
				</div>
				<input type="text" class="form-control" name="author" placeholder="请输入作者信息" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">出版社</span>
				</div>
				<input type="text" class="form-control" name="public" placeholder="请输入出版社信息" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">价格</span>
				</div>
				<input type="text" class="form-control isok" name="price" placeholder="请输入价格" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">数量</span>
				</div>
				<input type="text" class="form-control" name="number" placeholder="请输入书籍数量" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">馆藏位置:</span>
				</div>
				<select class="form-control form-select" name="floor">
					<option value="图书馆一楼">图书馆一楼</option>
					<option value="图书馆二楼">图书馆二楼</option>
					<option value="图书馆三楼">图书馆三楼</option>
					<option value="图书馆四楼">图书馆四楼</option>
				</select>
			</div>
			<div class="form-group">
				<label for="text">描述信息:</label>
				<textarea type="text" id="text" placeholder="请输入描述信息" class="form-control" name="text"></textarea>
			</div>
			<input type="hidden" value='<?php echo $row[0]; ?>' name="bid"/>
			<div class="form-group">
				<input type="submit" class="form-control btn btn-success" value="确认修改" />
			</div>
		</form>
	</div>
</body>
</html>

<script>
	$(function(){
		var len = row.length;
		
		for(var i=0;i<len;i++){
			$('select[name="choice"]').append("<option value="+row[i][0].id+">"+row[i][0].type_name+"</option>")
			console.log(row[i][0].id);
		}
	})
</script>