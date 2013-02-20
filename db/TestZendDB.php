<?php

use \Zend\Db\Adapter\Adapter;
use \Zend\Db\ResultSet\ResultSet;
use \Zend\Db\Sql\Select;

spl_autoload_register(function ($class) {
	include '..\\zendframework\\library\\' . $class . '.php';
	include '.' . $class;
});
class TestZendDB {
	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;

	}

	public function fetchAll($currYear)
	{


		$select = new Select();
		$select->from('self_assess_layout')
		->join('self_assess_question', 'self_assess_question_pk=self_assess_layout.self_assess_question_fk', array('self_assess_question'=>'label', 'source_table'=>'source_table'))
		->join('self_assess_format', 'self_assess_format_pk=self_assess_question.self_assess_format_fk', array('self_assess_format_pk'=>'self_assess_format_pk', 'self_assess_format'=>'format'))
		->where(array('eval_year' => $currYear))
		->order('sequence ASC');
		$statement = $this->adapter->createStatement();
		$select->prepareStatement($this->adapter, $statement);
		$resultSet = new ResultSet();
		$resultSet->initialize($statement->execute());
		$resultSet->buffer(); // very important in order for foreach to be repeated in the phtml files
		$resultSet->next(); // see explanation above
		return $resultSet;
	}

}