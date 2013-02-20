<?php
session_start();
	if(isset($_SESSION['helen'])){
	  unset($_SESSION['helen']);
	}
echo 'Removed session helen variable. Testing the unset function in PHP';

var_dump($_SESSION);
?>