<?php

require_once __DIR__.'/../../core/functions.php';

Class DashboardController {

    public function __construct()
    {
        $functions = new Functions;
        $functions->appSecurity();
    }

    public function index()
    {
        $functions = new Functions;
        Functions::callView('dashboard/dashboard-layout');
    }

    public function show()
    {
        $functions = new Functions;
        $model = new SampleModel;
        $results = $functions->dbQueryGet('SELECT * FROM '.$model->table);

        Functions::callView('index',$results);
    }

    public function create()
    {
        Functions::callView('sample/create-sample');
    }

    public function store($requests)
    {
        $functions = new Functions;
        $model = new SampleModel;
        $functions->dbQueryExec(
            'INSERT INTO '.$model->table.' (user,status,datestamp) VALUES (?,?,now())',
            'ss',
            [$requests['user'],$requests['status']]
        );

        Functions::directTo(Functions::transRootConfig('app_config','app_index'));
    }

    public function destroy($requests)
    {
        $functions = new Functions;
        $result = $functions->dbQueryExec(
            'DELETE FROM dev_fieldwork.fw_control WHERE process_id = ?',
            's',
            [$requests['id']]
        );

        Functions::directTo(Functions::transRootConfig('app_config','app_index'));
    }

}

?>