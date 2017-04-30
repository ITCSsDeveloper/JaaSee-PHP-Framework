<?php
// Header For View 
// include By view_*
include_once('tool/checkLogin.php');
$pageLoad = 'model/model_' . str_replace('view_', '', $_SESSION['lastPage']);
include_once($pageLoad);
?>