<?php
	$conn = new mysqli("127.0.0.1", "root", "", "myweb");
	
	if(!$conn){
		die("Fatal Error: Connection Failed");
	}
?>