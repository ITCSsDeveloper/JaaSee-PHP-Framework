<?php
	$_pageNotFound = true;
	foreach ($route as $key => $page) {
		if(@$_SESSION['_lastPage'] == $page['name'] || isset($_GET[$page['name']]) )
		{
			$_pageNotFound = false;
			if($page['authen'] == true)
			{
				include_once('tool/checkLogin.php');
			}
			include_once('view/' . $page['page']);
			$_SESSION['_lastPage'] = null;
		}
	}
	if($_pageNotFound)
	{
		include_once('view/_layout/_404.php');
	}
?>