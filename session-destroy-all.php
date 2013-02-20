<?php
session_start();

session_destroy();

echo 'session_destroy() destroys everything in the session.<br>';

var_dump($_SESSION);

?> 