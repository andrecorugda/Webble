<?php

Class AppController {

    public function app_404()
    {
        callView('404');
    }

    public function app_405()
    {
        callView('405');
    }

}

?>