<?php

Class SampleModel {

    public function __construct()
    {
        $this->table = 'fw_control';
        $this->fillable = [
            'process_id',
            'user',
            'status',
            'datestamp'
        ];
    }

}

?>