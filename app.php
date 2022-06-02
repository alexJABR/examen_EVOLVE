<?php
date_default_timezone_set('America/Mexico_City');
session_start();

require 'models/usersModel.php';
require 'models/coloresModel.php';
require 'database/Database.php';

define('SESSION', 		$_SESSION);
define('IS_LOGGED',		SESSION!=null);
define('USER', 			!IS_LOGGED ? null : array('ID' => SESSION['USER_ID'], 'EMAIL' => SESSION['USER_EMAIL'],'COLOR' => SESSION['USER_COLOR']));

define('USER_ID', 		IS_LOGGED ? SESSION['USER_ID'] : null);
define('USER_EMAIL', 	IS_LOGGED ? SESSION['USER_EMAIL'] : null);
define('USER_COLOR', 	IS_LOGGED ? SESSION['USER_COLOR'] : null);
define('DB_HOST', 		'localhost');
define('DB_PORT', 		3306);
define('DB_DATABASE', 	'examen_evolve_db');
define('DB_USER', 		'developer');
define('DB_PASS', 		'password');
