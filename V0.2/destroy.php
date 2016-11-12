<?php session_start();
		include_once('include/fonctionUtile.php');
	session_destroy();
	go('index.php'); ?>