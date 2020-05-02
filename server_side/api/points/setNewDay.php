
<?php
    include_once '../api.php';

    $api = new Api();
	$json1 = file_get_contents('http://localhost/api/'); 
	$student_data = json_decode($json1);
    $subjects = $student_data->items[0]->n_subj;
    $attitudes = $student_data->items[0]->n_act;
    $res=$api->setNewDay($subjects, $attitudes);

    var_dump($res);
    if ($res[0] && $res[1]){
    	echo json_encode('done');
    }else{
    	echo json_encode('Error setting new day');
    }
?>