<?php

Class DashboardController {

    public function __construct()
    {
        //appSecurity();
    }

    public function index()
    {
        callView('dashboard/dashboard-layout');
    }

    public function show()
    {
        $model = new SampleModel;
        $results = dbQueryGet('SELECT * FROM '.$model->table);

        callView('index',$results);
    }

    public function create()
    {
        callView('sample/create-sample');
    }

    public function store($requests)
    {
        $model = new SampleModel;
        dbQueryExec(
            'INSERT INTO '.$model->table.' (user,status,datestamp) VALUES (?,?,now())',
            'ss',
            [$requests['user'],$requests['status']]
        );

        directTo(transRootConfig('app_config','app_index'));
    }

    public function destroy($requests)
    {
        $result = dbQueryExec(
            'DELETE FROM dev_fieldwork.fw_control WHERE process_id = ?',
            's',
            [$requests['id']]
        );

        directTo(transRootConfig('app_config','app_index'));
    }

}

?>