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
 
/*** physical path to the system ***/
define("PATH", dirname(__FILE__));

/*** directory separator ***/
define("DS", DIRECTORY_SEPARATOR);

/*** load configuration file ***/
if(file_exists(PATH . DS . "config.php")) {
  require_once(PATH . DS . "config.php");
} else {
  die("[ERROR] Configuration file could not be loaded.");
}

/*** load init file ***/
if(file_exists(PATH . DS . "core" . DS . "init.php")) {
  include_once(PATH . DS . "core" . DS . "init.php");
} else {
  die("[ERROR] Init file could not be found.");
}

?>