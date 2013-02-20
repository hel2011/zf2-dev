<?php
/* This is version 2
*/
?>

<html>
<body>
<strong>Test code to show the session.gc_maxlifetime value in the PHP.INI file <br></strong>
<?php
//retrieve session data
ini_set ( "session.gc_maxlifetime" , "1800" );
echo "session.gc_maxlifetime is " . ini_get('session.gc_maxlifetime');
echo "<BR>";

//echo var_dump (ini_get_all());

?>

</body>
</html> 