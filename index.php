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