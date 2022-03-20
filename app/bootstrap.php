<?php 

$app = require_once APP_FILE_PATH.'/app/Core/App.php';

$app->setHelperFunctions();
$app->globalRoutes();
$app->run();