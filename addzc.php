<?php
include("./conn/conn.php");
session_start();//开启session功能



$username = $_POST['name'];
//$dlmm = $_POST['dlmm'];
//$qrmm = $_POST['qrmm'];
$password = md5($_POST['userpwd']);
$lxdh = $_POST['phone'];
$sex = $_POST['sex'];
if(mysqli_num_rows(mysqli_query($conn,"select * from user where username='$username';"))>0){
	echo'<script>alert("该用户名已被注册，请更换用户名重新注册！")</script>';
	echo'<script>location.href="regsiter.php"</script>';
	}
	else{
	$query1="insert into user(`username`,`password`,`phone`,`sex`)values('$username','$password','$lxdh','$sex')";
	$res = mysqli_query($conn,$query1);
	}if(mysqli_affected_rows($conn)>0){
	//注册成功
	//header('location:../index.php');
	echo'<script>alert("注册成功")</script>';
	echo'<script>location.href="index.php"</script>';
	}else{
	echo'<script>alert("注册失败，请重新注册！")</script>';//注册失败
	//echo'<script>location.href="../regsiter.php"</script>';
}
