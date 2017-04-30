<?php
 @session_start();
 if(isset($_GET['_token']) || isset($_POST['_token']))
 {
 	if(isset($_GET['_token'])) { $_coppyToken = $_GET['_token']; }
 	if(isset($_POST['_token'])) { $_coppyToken = $_POST['_token']; }

	if(@$_SESSION['_token'] != $_coppyToken)
	{
		echo 'Token Invalid.';
		exit();
	}
 }
 else
 {
 	echo 'No Token.';
	exit();
 }
?>