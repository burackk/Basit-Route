<?php

use Core\Route\Route;

Route::get("deneme", ["Handlers\Get\IndexHandler", "index"]);
Route::get("eslestir", ["Handlers\Get\IndexHandler", "index"]);