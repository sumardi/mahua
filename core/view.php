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
 
class View
{
	/**
 	* The registry
 	* @var object
 	* @access private
 	*/
	private $registry;

	/**
	 * Variables array
	 * @var array
	 * @access private
	 */
	private $vars = array();
	
	/**
   	 * layout name
   	 * @var string
   	 * @access protected
   	 */
  	protected $layout;

	/**
	 * Constructor method
	 * @param object $registry
	 * @access public
	 * @return void
	 */
	public function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	 * set variables for view
	 * @param string $name
	 * @param mixed $value
	 * @access public
	 * @return void
	 */
	public function __set($name, $value) {
		$this->vars[$name] = $value;
	}
	
	/**
	 * get variables for view
	 * @param string $name
	 * @access public
	 * @return mixed
	 */
	public function __get($name) {
		return $this->vars[$name];
	}

	/**
	 * Display the view file
	 * @throws Exception
	 * @access public
	 * @return void
	 */
	public function getAction() {
	  	$controller = $this->registry->dispatcher->controller;
		$action = !empty($this->registry->dispatcher->action) ? $this->registry->dispatcher->action : "index";
		$path = PATH . DS . "views" . DS . $controller . DS . "$action.html";
		if (file_exists($path) == false) {
		  	die('[ERROR] Template could not be found in '. $path);
			return false;
		}
		return $path;
	}

	/**
	 * Render the view
	 * @param string $layout_name
	 */
	public function render($layout_name = false) {
		$content = $this->getAction();
		
		/*** get variables ***/
		foreach($this->vars as $name => $value) {
			${$name} = $value;
		}
		//$URL = URL;
		
	    /*** if layout is no value, set default layout ***/
		$this->layout = !empty($layout_name) ? $layout_name : "default";
		$layout_path = PATH . DS . "views" . DS . "layout" . DS . $this->layout . ".html";
		
		if (file_exists($layout_path) == false) {
		  	die('[ERROR] Layout could not be found in '. $layout_path);
			return false;
		} else {
			include_once($layout_path);
		}
	}
	
	/**
	 * Destructor method
	 * @return void
	 */
	public function __destruct() {
	      $this->render($this->layout);
	}


}

?>