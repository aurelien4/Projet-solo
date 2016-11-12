<?php 
	session_start();
	include "include/fonctionUtile.php";
	session_destroy();
	go('index.php');
 ?>