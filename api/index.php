<?php
	if(!empty($_GET['action'])){
		$action = $_GET['action'];
	}else{
		exit("Sorry, you need define the action!");
	}
	$inside = true;
	require("../config.php");
	require("actions/".$action.".php");
?>