<?php

use AD7six\Dsn\Wrapper\CakePHP\V2\DbDsn;

class DATABASE_CONFIG {

/**
 * Define connections using environment variables
 *
 * @return void
 *
 *	public function __construct() { NOT SURE WHAT THIS DOES??
 *		$this->default = DbDsn::parse(env('DATABASE_URL'));
 *		$this->test = DbDsn::parse(env('DATABASE_TEST_URL'));
 *	}
*/
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'jj_cakev2',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

}