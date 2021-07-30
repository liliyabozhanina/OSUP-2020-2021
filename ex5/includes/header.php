<?php
	session_start();
	session_regenerate_id(true);
	if(!isset($_SESSION['user'])){
		header("Location: index.php");
		exit;
	}
	
	if($_SERVER['HTTP_USER_AGENT']!==$_SESSION['user_agent']){
		echo 'Session fixation';
		exit;
	}
?><!DOCTYPE html>
<html lang="bg-BG">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title><?=$_SESSION['user']?></title>
<link rel="stylesheet" href="./includes/style.css" type="text/css" media="all" />
</head>
<body>
<div class="wrapper">
	<div class="search">
		<form action="search.php" method="GET">
			<input type='text' name='search' value='<?=trim(htmlentities($_GET['search']??"", ENT_QUOTES | ENT_HTML5, "UTF-8"))?>' />
			<input type="submit" name="submit" value="Търси" />
		</form>
	</div>
	<div class="contents">