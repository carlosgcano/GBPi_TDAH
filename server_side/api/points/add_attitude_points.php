<?php
    include_once '../api.php';


    $api = new Api();
    $json1 = file_get_contents('http://localhost/api/'); 
    $student_data = json_decode($json1);
    $n_act = $student_data->items[0]->n_act;
    $attitude_status = $student_data->items[0]->attitude_status;
    print("este es act:".$n_act );
    print("este es attitude_status:".$attitude_status );
    print("este es substr_count:".$attitude_status );
    if(substr_count($attitude_status, 'green')<=$n_act){
        print("este es att:".$attitude_status );
        $res=$api->add_point_attitude($attitude_status);
    }
?>