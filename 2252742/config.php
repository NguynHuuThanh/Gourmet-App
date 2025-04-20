<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

$baseUrl = $protocol . $host . $scriptDir;

define('BASE_URL', $baseUrl);
define('API', $baseUrl . '/api/');
?>