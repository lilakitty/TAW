<?php
	include_once('db/database_utilities.php');

	//En caso de que se encuentre el id la funcion delete se ejecuta.
	if(isset($_GET['id'])){
		$t = $_GET['t'];
		delete($_GET['id']);
		header("location: listado.php?t=".$t);
	}

?>