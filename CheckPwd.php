<?php
include("./conn/conn.php");
session_start();//开启session功能

$username = $_POST["username"];
//$pwd = $_POST["userpwd"];
//echo $role." ".$username." ".$pwd;
$pwd = md5($_POST['userpwd']);
$Check = "select * from user where password ='$pwd' and username ='$username' ";

$result = mysqli_query($conn,$Check);//结果集
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($num>0){
	$_SESSION["username"]=$username;
	$_SESSION['uid'] = $row['id'];
	header("Location:User/user_index.php");
	
	
	/*if($role=="user"){
		header("Location:User/user_index.php");
	}
	else{
		header("Location:Admin/admin_index.php");
	}*/
}else{
	echo"<script>";
	echo"alert(\"错误的用户名或者密码，请重新登录\");";
	//echo"alert(\"$pwd"." "."$username"." "."\");";
	echo"location.href=\"index.php\"";
	echo"</script>";		
}
?>