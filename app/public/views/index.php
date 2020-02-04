<?php

foreach($data as $data){
    echo '<a href="test.html">See</a><p> '.$data['process_id'].' </p>';
    echo '<p> '.$data['user'].' </p>';
    echo '<p> '.$data['status'].' </p>';
    echo '<p> '.$data['datestamp'].' </p>';
    echo '</br>';
}

?>