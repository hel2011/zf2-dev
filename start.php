

<html>
<body>

<?php
//retrieve session data
ini_set ( "session.gc_maxlifetime" , "1800" );
echo "session.gc_maxlifetime is " . ini_get('session.gc_maxlifetime');
echo "<BR>";

//echo var_dump (ini_get_all());

?>

</body>
</html> 