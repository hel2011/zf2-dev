<?php
/*
 * To start or use a session, use session_start()
 * When you use another page, and wish to access the session data, 
 * you must include the session_start()  on that page as well.
 */
session_start();

//echo "session.gc_maxlifetime is " . ini_get('session.gc_maxlifetime');

// store session data
$_SESSION['helen']=1;
$_SESSION['hello']="world";
$_SESSION['LAST_ACTIVITY'] = new DateTime();// update last activity time stamp
?>

<html>
<body>

<?php
//retrieve session data
var_dump($_SESSION);
?>

</body>
</html> 