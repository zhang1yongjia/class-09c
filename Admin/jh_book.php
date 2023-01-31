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
	
	<div id="msg2">
		<h1>图书借还</h1>
		<form method="post" action="">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">用户id</span>
				</div>
				<input type="text" id="uid" class="form-control" name="uid" placeholder="请输入用户id" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">图书名</span>
				</div>
				<input type="text" class="form-control" name="bname" placeholder="请输入图书名称" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">作者</span>
				</div>
				<input type="text" class="form-control" name="author" placeholder="请输入作者名称" />
			</div>
			
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">操作:</span>
				</div>
				<select class="form-control form-select" name="vis">
					<option value="1">借书</option>
					<option value="2">还书</option>
				</select>
			</div>
			
			<div class="form-group">
				<input type="submit" class="form-control btn btn-success" value="提交" />
			</div>
		</form>
	</div>
	<?php
	include_once("../tools.php");
	include_once("../conn/conn.php");
	
	if(empty($_POST['uid'])) return ;
	$uid = $_POST['uid'];
	$bname = $_POST['bname'];
	$author = $_POST['author'];
	$vis = $_POST['vis'];
	$bid = fbookid($bname,$author,$conn);
	
	if($bid==0){
		echo "<script>";
		echo "alert(\"借书失败，没有该书籍\");";
		echo "location.href=\"jh_book.php\";";
		echo "</script>";
	}
	$time = time();
	
	$sql = "select * from borrowdetail where user_id = '$uid' and book_id = '$bid' and `status`=1;";
	
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	echo mysqli_error($conn);
	if(($num==0&&$vis==1)||($num>0&&$vis==2)){
		if($vis==1){
			$sql = "insert into borrowdetail values(0,$uid,$bid,1,$time,null)";
		}else{
			$sql = "update borrowdetail set `status`=2,return_time = '$time' where user_id='$uid' and book_id = '$bid';";
		}
		
		$reslut = mysqli_query($conn,$sql);
		echo mysqli_error($conn);
		if($result){
			if($vis==1){
				$sql = "update book set number=number-1 where id = '$bid';";
			}else{
				$sql = "update book set number=number+1 where id = '$bid';";
			}
			echo mysqli_error($conn);
			mysqli_query($conn,$sql);
			echo "<script>";
			if($vis==1){
				echo "alert(\"借书成功!\");";
			}else{
				echo "alert(\"还书成功!\");";
			}
			// echo "location.href=\"jh_book.php\";";
			echo "</script>";
		}
	}else{
		echo "<script>";
		if($vis==1){
			echo "alert(\"本书已借尚未归还，如需借阅请先归还此书！\");";
		}else{
			echo "alert(\"没有借阅记录\");";
		}
		
		// echo "location.href=\"jh_book.php\";";
		echo "</script>";
	}
	?>
</body>
</html>