<?php
session_start();
include('../tool/checkToken.php');
include('dbms.php');

if(isset($_POST['doLogin']))
{	
	session_unset();

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == '' || $password == '')
	{
		$_SESSION['notify_type'] = 'danger';
		$_SESSION['notify_string'] = 'Username หรือ Password เป็นค่าว่าง';
		header('Location: ..');
		exit();
	}

	$password = hash('sha512', ($password . $appkey));

	$sql_comm = "SELECT * FROM `user_tb` WHERE `username` = '$username' AND `password` = '$password'";
	if($obj->dbms_select($sql_comm))
	{
		$_SESSION['login'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $obj->dbms_select($sql_comm)[0]->id;
		header('Location: ../index.php?dashboard');
		exit();
	}
	else
	{
		$_SESSION['notify_type'] = 'danger';
		$_SESSION['notify_string'] = 'เข้าสู่ระบบไม่สำเร็จ';
		header('Location: ..');
		exit();
	}
}
?>