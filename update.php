<?php
include('config.php');

if($_GET['key'] != $KeyUpdate || !isset($_GET['key']))
{
	echo 'KeyUpdate Invalid.';
	exit();
}

ini_set('max_execution_time', 60 * 5); //300 seconds = 5 minutes

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');
if ($conn->connect_error) {
	die('Connection failed: ' . $conn->connect_error);
	exit();
}

// Drop Table
$conn->query('DROP TABLE user_tb');

// Create Table
$conn->query("CREATE TABLE IF NOT EXISTS `user_tb` (
	`id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`username` text,
	`password` text,
	`level` text,
	`command` text
	)AUTO_INCREMENT=1215;");

// Seed Data
if(true){	
	$conn->query("INSERT INTO `user_tb` (`id`, `username`, `password`, `datetime`, `level`) VALUES (NULL, 'admin', '', CURRENT_TIMESTAMP, 'admin');");
}
$conn->close();


echo 'Update Database Complete.';
?>

