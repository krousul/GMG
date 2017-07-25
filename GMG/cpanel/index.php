<?php
include 'app/config.php';

include "controller/con_login.php";
$login = new Login();
$login->starCpanel();

header("Location: views/login.php");
?>