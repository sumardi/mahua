<?php
/*
Mahua Framework is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Mahua Framework. If not, see <http://www.gnu.org/licenses/>

Author : Sumardi Shukor <smd@php.net.my>
 */
 
/*** mysql database hostname (localhost/127.0.0.1) ***/
define("DB_HOST", "localhost");

/*** username to connect to the database ***/
define("DB_USER", "root");

/*** password for database user ***/
define("DB_PASSWD", "");

/*** database name ***/
define("DB_NAME", "training");

/*** virtual path to the system (without ending slash) ***/
define("URL", "http://localhost/framework");

/*** default route ***/
define("DEFAULT_ROUTE", "test/index");

// set default timezone
date_default_timezone_set("Asia/Kuala_Lumpur");

?>