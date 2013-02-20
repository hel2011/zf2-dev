<?php

/*
Note:

You can suppress the error message on failure by prepending a @ to the function name. 

PHP Database Fundamentals

PHP API's define functions, classes, methods, and variables made available to your PHP application.
API's can be object-oriented or procedural.

A connector allows you to connect to a database through a  driver which communicates with 
the database server.

PHP environment has core code, plus optional extensions. mySQL items are implemented as
extensions like PDO and mysqli.


In general to prevent sql injection attacks where mailicious code is appended to mySQL
statements

http://stackoverflow.com/questions/60174/best-way-to-prevent-sql-injection

PDO stands for PHP Data Objects is an extension you see installed under your phpinfo().
You must use the PDO driver for that database. PDO ships by default in later version of PHP.
It is an abstraction layer you can use across different types of database servers.

MYSQL Improved Extension is mysqli . It is slightly prepared over PDO. See http://www.php.net/manual/en/mysqli.overview.php


There is an older, deprecated PHP MySQL extension.

You basically have two options to achieve this:

    Using PDO:

    $stmt = $pdo->prepare('SELECT * FROM employees WHERE name = :name');

    $stmt->execute(array(':name' => $name));

    foreach ($stmt as $row) {
        // do something with $row
    }

    Using mysqli:

    $stmt = $dbConnection->prepare('SELECT * FROM employees WHERE name = ?');
    $stmt->bind_param('s', $name);

    $stmt->execute();

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        // do something with $row
    }



 */
$user="root";
$password="";
$database="dev";
mysql_connect("localhost",$user,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="CREATE TABLE contacts (id int(6) NOT NULL auto_increment,first varchar(15) NOT NULL,last varchar(15) NOT NULL,phone varchar(20) NOT NULL,mobile varchar(20) NOT NULL,fax varchar(20) NOT NULL,email varchar(30) NOT NULL,web varchar(30) NOT NULL,PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
mysql_query($query);
mysql_close();
?>