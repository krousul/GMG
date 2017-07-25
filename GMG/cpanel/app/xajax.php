<?php
	require XAJAX_CORE;
	
	$xajax=new xajax();
	$xajax->configure('javascript URI', XAJAX_JS);
	include  XAJAX_FUNC . "xajax_general.php";
	include  XAJAX_FUNC . "xajax_" .  $url . ".php";
	
	$xajax->processRequest();
?>