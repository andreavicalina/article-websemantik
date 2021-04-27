<?php
	ob_start();

	if(!isset($_SESSION)) {
		session_start();
	}

	$connect = mysqli_connect('localhost', 'root', '', 'semantik');

	if($connect -> connect_error) {
		die ("No Connection :(" . $connect -> connect_error);
	}
?>