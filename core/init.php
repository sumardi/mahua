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
ob_start();
session_start();

/**
 * autoload function
 * @param string $class class name
 */
function __autoload($class) {
	/*** split Camel-Cased string with lookaheads and lookbehinds ***/
	$words = preg_split('/(?<=\\w)(?=[A-Z])/', $class);
	/*** combine with underscore ***/
	$filename = strtolower(implode("_", $words));

	/*** include the desire file ***/
	if(file_exists(PATH . DS . "core" . DS . $filename . ".php")) {
		include_once(PATH . DS . "core" . DS . $filename . ".php");
	} elseif(file_exists(PATH . DS . "controllers" . DS . $filename . ".php")) {
		include_once(PATH . DS . "controllers" . DS . $filename . ".php");
	} elseif(file_exists(PATH . DS . "models" . DS . $filename . ".php")) {
		include_once(PATH . DS . "models" . DS . $filename . ".php");
	} else {
		die("[ERROR] File {$filename}.php does not exists.");
	}
}

/**
 * debugging variable
 * @param $var
 */
function pr($var) {
	echo "<pre>"; print_r($var); echo "</pre>";
}

?>