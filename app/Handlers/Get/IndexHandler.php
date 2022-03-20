<?php

namespace Handlers\Get;

use Handlers\BaseController;

class IndexHandler extends BaseController {


    public function index() {
        $this->view("eslestirme/index", [
            "title" => "Deneme"
        ]);
    }

}