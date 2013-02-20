<?php

use \Zend\Db\Adapter\Adapter;
use \Zend\Db\ResultSet\ResultSet;
use \Zend\Db\Sql\Select;

spl_autoload_register(function ($class) {
	include '..\\zendframework\\library\\' . $class . '.php';
	include '.' . $class;
});
class GetUser {
	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;

	}

	
	/*
	 * SELECT `user_pk` , `cwid` , `first_name` , `last_name` , `is_active` , `create_date` , `create_date_cwid` , `modify_date` , `modify_date_cwid`
FROM `user`
WHERE cwid = 'hel2011'
LIMIT 0 , 30
	 */
	public function getUser($cwid)
	{


		$select = new Select();
		$select->from('ofa_person')
		->where(array('cwid' => $cwid))
		->order('cwid ASC');
		
/*
 * 		$select->from('user')
		->where(array('cwid' => $cwid))
		->order('cwid ASC');
 */		
//		$select->columns(array('user_pk', 'cwid','first_name','last_name','is_active','create_date','create_date_cwid','modify_date','modify_date_cwid'));
		$statement = $this->adapter->createStatement();
		$select->prepareStatement($this->adapter, $statement);
		$resultSet = new ResultSet();
		$resultSet->initialize($statement->execute());
		$resultSet->buffer(); // very important in order for foreach to be repeated in the phtml files
		$resultSet->next(); // see explanation above
		return $resultSet;
	}
	public function getEvalYear($inputDateTime )
	{
	// enter a date time, and find the matching eval year. Typically enter today's date
	
		$tempDate = date('Y-m-d H:i:s',$inputDateTime);
		$select = new Select();
		$select->from('eval_year');
		$predicate = new  \Zend\Db\Sql\Where();
		$select->where($predicate->greaterThanOrEqualTo('eval_year_end',$tempDate));
		$select->where($predicate->lessThanOrEqualTo('eval_year_start',$tempDate));
		/*
This seems to work and be equivalent to

select * from eval_year where sysdate() >= eval_year_start 

and sysdate()<= eval_year_end
order by eval_year_end desc


http://stackoverflow.com/questions/12610866/zf2-zend-db-sql-sql-using-predicate-in-where-condition
		*
		*
		*/
		$statement = $this->adapter->createStatement();
		$select->prepareStatement($this->adapter, $statement);
		$resultSet = new ResultSet();
		$resultSet->initialize($statement->execute());
		$resultSet->buffer(); // very important in order for foreach to be repeated in the phtml files
		$resultSet->next(); // see explanation above
		return $resultSet;
	}
	
	public function getUserYear($cwid,$year )
	{
	
		$select = new Select();
		$select->from('user_year');
		$select->where(array('user_fk' => 1, 'eval_year' => $year));
				
		$statement = $this->adapter->createStatement();
		$select->prepareStatement($this->adapter, $statement);
		$resultSet = new ResultSet();
		$resultSet->initialize($statement->execute());
		$resultSet->buffer(); // very important in order for foreach to be repeated in the phtml files
		$resultSet->next(); // see explanation above
		return $resultSet;
	}
}