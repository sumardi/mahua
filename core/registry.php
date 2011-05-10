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
 
class Registry 
{
	/**
	* the vars array
	* @access private
	*/
	private $vars = array();

	/**
	* set undefined vars
	* @param string $key variable's name
	* @param mixed $value variable's value
	* @access public
	* @return void
	*/
	public function __set($key, $value) {
		$this->vars[$key] = $value;
	}

	/**
	* get undefined variables
	* @param mixed $index variable's name
	* @access public
	* @return mixed
	*/
	public function __get($key) {
		return $this->vars[$key];
	}
}

?>