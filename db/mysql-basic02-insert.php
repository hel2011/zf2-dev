<?php
/*
 * mysql also inserts with this format:
 * 
 * INSERT INTO table_name (column1, column2, column3,...)
VALUES (value1, value2, value3,...) 

 */

$user="root";
$password="";
$database="dev";
mysql_connect("localhost",$user,$password);
@mysql_select_db($database) or die( "Unable to select database");



//$query = "INSERT INTO contacts VALUES ('','John','Smith','01234 567890','00112 334455','01234 567891','johnsmith@gowansnet.com','http://www.gowansnet.com')";


$query = "INSERT INTO contacts VALUES ('','Helen','Lau','0533 23333','003333 324323','23432 23432','hel2011@med.cornell.edu','http://med.cornell.edu')";
mysql_query($query);
mysql_close();