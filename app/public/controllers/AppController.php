<?php

require_once __DIR__.'/../../core/functions.php';

Class AppController {


    public function app_404()
    {
        $functions = new Functions;
        Functions::callView('404');
    }

    public function app_405()
    {
        $functions = new Functions;
        Functions::callView('405');
    }

}

?>