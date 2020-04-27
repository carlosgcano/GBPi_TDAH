<?php

include_once 'post.php';

class Api{


    function getAll(){
        $student = new Student();
        $students = array();
        $students["items"] = array();

        $res = $student->getStudents();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "n_subj" => $row['n_subj'],
                    "n_act" => $row['n_act'],
                    "n_medal" => $row['n_medal'],
                    "n_trophy" => $row['n_trophy'],
                    "total_points" => $row['total_points'],
                    "student_name" => $row['student_name'],
                    "subject_status" => $row['subject_status']
                );
                array_push($students["items"], $item);
            }
        
            echo json_encode($students);
        }else{
            echo json_encode(array('message' => 'No elements'));
        }
    }
}

?>