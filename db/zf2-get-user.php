<?php
/*
 * 
 * http://stackoverflow.com/questions/13104851/zend-framework-2-tablegateway-returning-empty-resultset
 * 
 * Joining looks like this:
 * public function fetchAll()
{
    $sql = new Sql($this->tableGateway->getAdapter());

    $select = $sql->select();
    $select->from('Entreprise')
        ->columns(array('id', 'nom', 'categorie_id'))
        ->join(array('C' => 'Categorie'), 'categorie_id = C.id', array('categorie' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER);
    $resultSet = $this->tableGateway->selectWith($select);
    return $resultSet;
}
 */



use \Zend\Db\Adapter\Adapter;
use \Zend\Db\ResultSet\ResultSet;
use \Zend\Db\Sql\Select;

spl_autoload_register(function ($class) {
	/*
	 * Here we decide if the class file is not defined
	 * in the current directory, then look in the
	 * zf2 library folders.
	 * 
	 * For this simple setup for testing and prototyping,
	 * this works fine.
	 */	
	$file = $class . '.php';
	if(file_exists($file)) {
		require_once $file;
	}
	else
	{
		include '..\\zendframework\\library\\' . $class . '.php';
		//	include '.\\' . $class;
		
	}	
	
});

	echo "Test page for testing Zend\Db classes </br>";
	
	
	$db =  array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=eval;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
			'username' => 'eval_user',
			'password' => 'password',			
        );
        
	$adapter = new Adapter($db);
	
	$class = "GetUser";

	
	$test = new GetUser($adapter);
	$cwid = "hel2011";
	$result = $test->getUser($cwid);

	$currentDate = date('Y-m-d H:i:s');
	//$currentDate = date('F j, Y, g:i a');
	
	
	echo "current date is " . $currentDate;
	$result = $test->getEvalYear(time());

	
	$result = $test->getUserYear('hel2011',2012);
	?>

<pre>
<?php 
foreach ($result as $row) {
//let's iterate through the arrayObject - see http://us2.php.net/manual/en/class.arrayobject.php
	
	$iterator = $row->getIterator();
	
	while($iterator->valid()) {
		echo $iterator->key() . ' => ' . $iterator->current() . "\n";
	
		$iterator->next();
	}
  
	
}
 print_r($result);
?>
</pre>