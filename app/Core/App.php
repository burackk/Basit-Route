<?php 

spl_autoload_register(function ($class) {
    $prefix = '';
    $base_dir = APP_FILE_PATH . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {

        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
use Core\Route\Route;
use Core\Route\BaseRoute;

class App  {
    private BaseRoute  $baseRoute;
    private Route $route;

    public function __construct() {
        $this->baseRoute = new \Core\Route\BaseRoute();
        $this->route = new Route();
        $this->route->createInstance($this->baseRoute);
        Route::createRoute($this->route);
    }

    /**
     *  Helpersa bir dosya eklenirse aynı şekilde burayada eklensin ki global olarak çekilsin. 
    */
    public function setHelperFunctions() {
        $arr = [
            "PathHelpers.php"
        ];

        foreach ($arr as $helper) {
            require_once APP_FILE_PATH.'/app/helpers/'.$helper;
        }
    }

    /**
     * Request methoduna göre routeları çekmektedir.
    */
    public function globalRoutes() {
        if(isset($_SERVER["REQUEST_METHOD"])) {
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                require APP_FILE_PATH.'/app/Routes/Web.php';
            } else {
                require APP_FILE_PATH.'/app/Routes/Api.php';
            }
        }
    }

    /**
     * Eklenen tüm routelerı init etmek için kullanılmaktadır. 
    */
    public function run() {
        $this->baseRoute->runRoute();
    }
}

return new App();