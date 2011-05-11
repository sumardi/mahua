<?php
/**
 * Mahua Framework
 * a simple & lightweight php framework
 *
 * @author		Sumardi Shukor <smd@php.net.my>
 * @license		GNU GPL
 * @version		0.1
 * 
 * Mahua Framework is free software; you can redistribute it and/or modify it under the terms of 
 * the GNU General Public License as published by the Free Software Foundation; either version 2 
 * of the License, or (at your option) any later version.
 * 
 * You should have received a copy of the GNU General Public License along with Mahua Framework. 
 * If not, see <http://www.gnu.org/licenses/>
 *
 */
 
class Model
{
	/**
	 * define database connection
	 * @var resource
	 * @access private
	 */
	static private $connection;

	/**
	 * define database resource
	 * @var object
	 * @access protected
	 */
	protected $db;

	/**
	 * define table's name
	 * @var string
	 * @access protected
	 */
	protected $table;

	/**
	 * Model's name
	 * @var string
	 * @access protected
	 */
	protected $name;

	/**
	 * The registry
	 * @var object
	 * @access private
	 */
	private $registry;
	
	/**
	 * In constructor method, we open connection to database
	 * @param object registry's object
	 * @access public
	 * @return void
	 */
	public function __construct($registry) {
		$this->registry = $registry;
		Model::$connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWD) or die(mysql_error());
		$this->db = mysql_select_db(DB_NAME) or die(mysql_error());
		
		$this->table = if(!empty($this->name)) ? $this->name : $this->registry->dispatcher->model;
	}
	
	/**
	 * In desctructor method, we close database connection
	 * @access public
	 * @return void
	 */
	public function __destruct() {
		mysql_close(Model::$connection);
	}
}
	
?>