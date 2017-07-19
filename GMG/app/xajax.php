<?php
	require XAJAX_CORE;
	include URL_CONTROLLER.'con_pageActive.php';
	
	$xajax=new xajax();
	$xajax->configure('javascript URI', XAJAX_JS);
	include  XAJAX_FUNC . "xajax_general.php";
	include  XAJAX_FUNC . "xajax_" .  $url . ".php";
	
	$xajax->processRequest();
?>