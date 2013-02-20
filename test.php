<?php
use \Zend\Session\Config\SessionConfig;
use \Zend\Session\SessionManager;
use \Zend\Session\Container;

/*
foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement

 */

spl_autoload_register(function ($class) {
	//include '..\\zendframework\\library\\' . $class . '.php';
	//	include __DIR__ . "\\zendframework\\library\\" . $class . '.php';
	//echo __DIR__ . "\\zendframework\\library\\" . $class . '.php';

	$splitArray = str_split($class);
	$redo = "";
	foreach ($splitArray as $value){
		//echo $value . " - ";
		
		if ($value == '\\'){
			//need to replace the backslash with a forward slash for this to work...
			$redo = $redo . "/";
		}
		else{
			$redo = $redo . $value;
		}
		
	}//foreach
	//echo "<br>" . 'redo is ' . $redo;
	//echo "<BR>";
	//$test = str_replace('\\', '/', addslashes ( $class ));
	
	//$test = str_replace('a', 'b', 'abc');
//	echo 'class is ' .$class . '<br>';
	//echo 'test is ' .$test;
	include __DIR__ . "//zendframework/library/" . $redo . ".php";
	//echo __DIR__ . "//zendframework/library/" . $redo . ".php";
	
	});

	
    		
///Applications/MAMP/htdocs/zf2-dev\zendframework\library\Zend\Session\Container.php
//echo __DIR__;

	//create some sample session data, then show it in the view
	$temp = new Container('base');
	$temp->offsetExists('cwid');
	 
	$temp->offsetSet('cwid','hel2011');
	

?>

<pre>
<?php 
print_r($temp);
?>
</pre>