<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start(); 
	include_once('controller/dbms.php');
	include_once('tool/reDirectHTTPS.php');
	include_once('viewAutoCore/_mainHeader.php'); 
	$_token = hash('sha1', (date('h:i:sa') . $appkey . rand(0,10))  ) ;
	$_SESSION['_token'] = $_token; 
	?>
</head>

<body>
	<?php include_once('view/_layout/_header.php'); ?>
	<?php include_once('viewAutoCore/_main.php'); ?>
	<?php include_once('view/_layout/_footer.php'); ?>


	<script src="assets/jQuery/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var _token = "<?php echo @$_token; ?>"
		var Element_From = (document.getElementsByTagName("form"));
		var input_token = document.createElement("input");      
		input_token.name = "_token";
		input_token.type = "hidden";
		input_token.value = _token;
		for(var i = 0; i < Element_From.length; i++ ) {	
			Element_From[i].appendChild(input_token.cloneNode(true));
		}
	</script>

</body>
</html>