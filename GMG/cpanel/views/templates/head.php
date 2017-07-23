<?php 
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
		$url = URL_VIEWS . "login.php";
		header("location: $url");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php $xajax->printJavascript('../../controller/xajax/');?>
  	<title> GMG | <?php echo ucwords($url); ?> </title>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	
  	<link rel="stylesheet" type="text/css" href= "<?= CSS?>vendor.css">
  	<link rel="stylesheet" type="text/css" href= "<?= CSS?>flat-admin.css">

  	<!-- Theme -->
  	<link rel="stylesheet" type="text/css" href= "<?= CSS?>theme/blue-sky.css">
  	<link rel="stylesheet" type="text/css" href= "<?= CSS?>theme/blue.css">
  	<link rel="stylesheet" type="text/css" href= "<?= CSS?>theme/red.css">
  	<link rel="stylesheet" type="text/css" href= "<?= CSS?>theme/yellow.css">

	<script src="<?= JS?>app_instagram.js" defer></script>
</head>