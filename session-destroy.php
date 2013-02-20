<?php
session_start();
	if(isset($_SESSION['helen'])){
	  unset($_SESSION['helen']);
	}
echo 'Removed session helen variable';

var_dump($_SESSION);
?>