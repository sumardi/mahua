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
 
abstract class Controller {
	/**
	 * registry object
	 * @var object
	 */
	private $registry;

	/**
	 * defined variables for view
	 * @var array
	 */
	private $vars = array();

	/**
	 * layout name
	 * @var unknown_type
	 */
	private $layout = "layout";

	/**
	 * User data
	 * @var array
	 */
	protected $data;

	/**
	 * Get model(s) to be used.
	 * @var array
	 */
	protected $models = array();

	/**
	 * Constructor method
	 * @param $registry
	 */
	public function __construct($registry) {
		$this->registry = $registry;

		/*** load up the view ***/
    	$this->registry->view = new View($this->registry);

		/*** load up the model ***/
        if(empty($this->model)) {
            $model = $this->registry->dispatcher->model;
            $this->{$model} = new $model($registry);
        } else {
        	foreach($this->models as $model) {
        		$this->{$model} = new $model($registry);
        	}
        }
        
		if($_POST) {
			$this->data = $_POST;
		}
	}

	/**
	 * set undefined variables
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function __set($name, $value) {
		$this->vars[$name] = $value;
	}

	/**
	 * get the undefined variable
	 * @param string $name
	 @ @return mixed
	 */
	public function __get($name) {
		return $this->vars[$name];
	}

	/**
	 * Assign vars to view
	 * @param string $name
	 * @param mixed $value
	 */
	protected function assign($name, $value) {
		$this->registry->view->$name = $value;
	}

	/**
	 * redirect to url
	 * @param string $rt
	 */
	protected function redirect($rt) {
      header("location:" . URL . "/" .$rt);
      exit;
	}
	
	/**
	 * abstract method index.
	 */
	public abstract function index();
}

?>