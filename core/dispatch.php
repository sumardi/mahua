<?php
/*
Mahua Framework is free software; you can redistribute it and/or modify it under the terms of 
the GNU General Public License as published by the Free Software Foundation; either version 2 
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Mahua Framework. 
If not, see <http://www.gnu.org/licenses/>

Author : Sumardi Shukor <smd@php.net.my>
 */
 
class Dispatch
{
	/**
	* the registry
	* @access private
	*/
 	private $registry;
 	
 	/**
 	 * the controller handler
 	 * @var string
 	 */
 	public $controller;

 	/**
 	 * the action handler
 	 * @var string
 	 */
 	public $action; 
 
 	/**
 	 * the model handler
 	 * @var string
 	 */
 	public $model;
 	
 	/**
 	 * the arguments handler
 	 * @var array
 	 */
 	private $args = array();
 	
 	/**
 	 * Constructor method
 	 * @param object $registry registry object
 	 * @access public
 	 * @return void
 	 */
 	public function __construct($registry) {
 		$this->registry = $registry;
 	}
 	
 	/**
 	 * Load the controller
 	 * @access public
 	 * @return void
 	 */
 	public function loader() {
 		/*** check the route ***/
 		$this->getRoute();
 		
 		/*** a new controller class instance ***/
		$controller_class = ucfirst($this->controller) . 'Controller';
		$controller = new $controller_class($this->registry);
		
		/*** check if the action is callable ***/
		if (is_callable(array($controller, $this->action)) == false) {
			die("[ERROR] Action could not be found.");
		} else {
			/*** call the action ***/
			call_user_func_array(array($controller,$this->action), $this->args);
		}
 	}
 	
 	/**
 	 * Get the controller
 	 * @access private
 	 * @return void
 	 */
 	private function getRoute() {
		 /*** get the route from the url ***/
		$route = (empty($_GET['rt'])) ? DEFAULT_ROUTE : $_GET['rt'];
		
		if (empty($route)) {
			$route = DEFAULT_ROUTE;
		} else {
			/*** get the parts of the route ***/
			$parts = explode('/', $route);
			if(!empty($parts)) {
				$this->controller = $parts[0];
				$this->model = $parts[0];
				array_shift($parts);
				$this->action = !empty($parts[0]) ? $parts[0] : "index";
				array_shift($parts);
				$this->args = $parts;
			}
		}
 	}
 	
 	/**
 	 * Display debugging message
 	 * @return string
 	 */
 	public function __toString() {
 		return "<b>Debug message >> :</b> <br />" .
 			 "Controller : " . $this->controller . "<br />" .
 			 "Model : " . $this->model . "<br />" .
 			 "Action : " . $this->action . "<br />" .
 			 "Args : " . implode(", ", $this->args) . "<br />";
 	}
}

?>