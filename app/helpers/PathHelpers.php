<?php 

function assets($url, $version = false): string {
    return WEBSITE_URL.'/public/'.$url.($version ? "?v=".rand() : "");
}

function view($url) {
    return APP_FILE_PATH.'/app/view/'.$url.'.php';
}
