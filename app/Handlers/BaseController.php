<?php
namespace Handlers;

class BaseController {

    private $theme = "default";

    protected function view($filename, $data = []) {
        $data["theme"] = $this->theme;
        require_once APP_FILE_PATH."/app/view/".$this->theme.'/'.$filename.".php";
    }

    public function get1() {
        echo "Deneme";
    }
}