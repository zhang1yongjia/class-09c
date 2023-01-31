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
	
	<form method="post" class="input-group form-group container" style="width: 500px; margin-top: 300px;">
		<div class="input-group-append">
			<span class="input-group-text">位置区域</span>
		</div>
		<input type="text" placeholder="请输入座位所属区域" class="form-control" required="required" name="seat"/>
		<button type="submit" class="btn btn-success">添加</button>
	</form>
	<?php
	include("../conn/conn.php");
	if(!empty($_POST['seat'])){
		$seat = $_POST['seat'];
		$sql = "insert into seat(location,static) values('$seat','0')";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo"<script>";
			echo"alert(\"添加座位成功！\");";
			echo"</script>";	
		}else{
			echo"<script>";
			echo"alert(\"添加座位失败！\");";
			echo"</script>";
		}
	}
	?>
		
</body>
</html>