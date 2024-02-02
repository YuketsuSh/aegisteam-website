<?php
@ob_start();
@session_start();

define('host', '62.210.136.165');
define('user', 'aegis');
define('passwd', '3B5ZmlTCm1z');
define('db', 'aegisteam');

$bdd = new PDO('mysql:host='.host.';dbname='.db, user, passwd);


@ob_start();
@session_start();

error_reporting(0);
ini_set("display_errors", "Off");

define('DIRECT', TRUE);

require 'function.php';
$user = new User;
$stats = new Stats;

?>