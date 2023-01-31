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
	
	<?php
	include_once("../conn/conn.php");
	
	$sql = "select * from user where id = ".$_GET['user'].";";
	
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	?>
	<div id="msg2">
		<h4>修改用户信息</h4>
		<form method="post" action="up_introduce2.php">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">用户名</span>
					</div>
					<input type="text" name="uname" class="form-control" value="<?php echo $row['1']; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">密码</span>
					</div>
					<input type="text" name="pwd" class="form-control" value="<?php echo $row['2']; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">性别</span>
					</div>
					<input type="text" class="form-control" name="sex" value="<?php echo $row[3]; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">联系电话</span>
					</div>
					<input type="text" class="form-control" name="tel" value="<?php echo $row[4]; ?>" />
				</div>
				<input type="hidden" name="uid" value="<?php echo $_GET['user'] ?>"/>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-success" value="确认修改" />
				</div>
			</div>
		</form>
		
</body>
</html>