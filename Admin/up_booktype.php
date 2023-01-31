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
	<title>修改书籍信息</title>
	<style>
		form>div{
			padding-top: 50px;
		}
		form{
			padding: 40px;
			border: solid black 1px;
			border-radius: 5px;
		}
	</style>
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
	
	<form method="post" class="form-group container " style="width: 450px; margin-top: 150px;">
		<h2>类别修改</h2>
		<div>
			<label for="d1">请输入新的类别名称:</label>
			<div class="input-group ">
				<div class="input-group-append">
					<span class="input-group-text">类别名称</span>
				</div>
				<input type="text" id="d1" placeholder="请输入新的类别名称" class="form-control" required="required" name="type"/>
			</div>
		</div>
		<div>
			<label for="d2">请输入类别描述信息:</label>
			<div class="input-group ">
				<div class="input-group-append">
					<span class="input-group-text">描述信息</span>
				</div>
				<input type="text" id="d2" placeholder="请输入类别描述信息" class="form-control" required="required" name="remark"/>
			</div>
		</div>
		<div>
			<input type="submit" class="btn btn-success form-control" value="提交">
		</div>
	</form>
	<?php
	include("../conn/conn.php");
	
	if(!empty($_POST['type'])){
		$type = $_POST['type'];
		$remark = $_POST['remark'];
		$id = $_GET['id'];
		$sql = "update book_type set type_name = '$type',remark = '$remark' where id = '$id';";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo"<script>";
			echo"alert(\"修改图书类别成功！\");";
			echo"</script>";	
		}else{
			echo"<script>";
			echo"alert(\"修改图书类别失败！\");";
			echo"</script>";
		}
	}
	?>
		
</body>
</html>