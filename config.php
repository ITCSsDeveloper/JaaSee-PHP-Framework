<?php
// Seting Region Zone
date_default_timezone_set('Asia/Bangkok'); 

// Key For Update.php?key=xxx
$KeyUpdate = '777';

//Run App in HTTPS only ?
$https = false;

//DataBase Config
$servername = 'localhost';
$dbname 	= 'xxxxxxxxx';
$username 	= 'xxxxxxxxx';
$password 	= 'xxxxxxxxx';

// Application Name
$appName = 'JaaSee by ITCS\'s Developer';

// App Key For Encryption Value
$appkey = 'XXXXXXXXXXXX';

// Route Array Can Access Content
$route = 
array(
	  array('name'=>'home', 'page' => 'home.php', 'authen' => false ),
);

// Developer Mode For DesignView
if(($devmode = 0) > 0 ) { echo '<meta http-equiv="refresh" content="' , $devmode , '" >'; } 

// Debug Mode For var_export Session
if(false) { 
	echo '<pre>===== Session =====<br>' ,var_export($_SESSION);
	echo '<br><br>===== GET =====<br>'  ,var_export($_GET);  
	echo '<br><br>===== POST =====<br>' ,var_export($_POST);  
	echo '</pre>';
}

//Error Report Control
if(false){
	@include_once('errorReport.php');
	@include_once('tool/errorReport.php');
	@include_once('../tool/errorReport.php');
}

// ClearFild
if(true){
	$FildClear = 'readonly onfocus="this.removeAttribute(\'readonly\');"';
}
?>