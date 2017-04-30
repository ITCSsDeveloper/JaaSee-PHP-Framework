<?php 
include('../controller/dbms.php');

if(isset($_POST['getAllClass']))
{
 	$sqlComm = "SELECT * FROM `class_tb`";
	$result = $obj->dbms_select($sqlComm);

	if($result)
	{
		$jsonResult['jsonFlag'] = 'true';
		$jsonResult['Attacker'] = json_encode($result['0']);
		$jsonResult['Defender'] = json_encode($result['1']);
		$jsonResult['Healer'] = json_encode($result['2']);
		echo json_encode($jsonResult);
		exit();
	}
}

$jsonResult['jsonFlag'] = 'false';
echo json_encode($jsonResult);
exit();
?>