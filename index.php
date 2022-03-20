<?php 

define("APP_FILE_PATH", __DIR__);
define("WEBSITE_URL", $_SERVER["REQUEST_SCHEME"].'//'.$_SERVER["SERVER_NAME"]);

require_once __DIR__.'/app/bootstrap.php';