<?php
$jsonFile = file_get_contents('Marav/Settings/config.json');
$json = json_decode($jsonFile);

// >>> GLOBAL SETTINGS <<< //

//-----TimeZone-----//
date_default_timezone_set($json->Settings->TimeZone);

// >>> Paths <<< //
// DOCUMENT ROOT
define("DOCUMENT_ROOT", $_SERVER[$json->Paths->DocumentRoot]);
//DOMAIN URI
define("HOST", $_SERVER[$json->Paths->Domain]);

//-----Framework-----//
// >>> FRAMEWORK ROOT PATH
define("MARAV", $json->Paths->Framework->Root);
// >> CORE PATH <<
define("CORE", MARAV . $json->Paths->Framework->Folders->Core->Root);
// CONTROLLERS PATH
define("CONTROLLERS", CORE . $json->Paths->Framework->Folders->Core->Folders[0]);
// MODELS PATH
define("MODELS", CORE . $json->Paths->Framework->Folders->Core->Folders[1]);
// VIEWS PATH
define("VIEWS", CORE . $json->Paths->Framework->Folders->Core->Folders[2]);
// >> LIBRARIES PATH <<
define("LIBRARIES", MARAV . $json->Paths->Framework->Folders->Libraries->Root);
// >> RESOURCES PATH <<
define("RESOURCES", MARAV . $json->Paths->Framework->Folders->Resources->Root);
// CLASSES PATH
define("CLASSES", RESOURCES . $json->Paths->Framework->Folders->Resources->Folders[0]);
// LAYOUT PATH
define("LAYOUT", RESOURCES . $json->Paths->Framework->Folders->Resources->Folders[1]);
// LOGS PATH
define("LOGS", RESOURCES . $json->Paths->Framework->Folders->Resources->Folders[2]);


// >>> ERRORS <<< //
function showErrors($bool)
{
	if($bool)
	{
		ini_set('display_errors', true);
		ini_set('display_startup_errors', true);
	}
	else
	{
		ini_set('display_errors', false);
		ini_set('display_startup_errors', false);
	}
	error_reporting(E_ALL);
}
