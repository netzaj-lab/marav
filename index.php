<?php
require_once 'Marav/Settings/config.php';
require_once CONTROLLERS . 'Controller.php';
require_once MARAV . 'init.php';

showErrors($json->Settings->Errors);

$time = microtime(true);

new Marav\Init();

echo '<br>';
echo microtime(true) - $time;
echo '<hr>';
echo '<br>';

var_dump(http_response_code());