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
                    "student_name" => $row['student_name'],
                    "subject_status" => $row['subject_status'],
                    "attitude_status" => $row['attitude_status'],
                    "game_time" => $row['game_time']
                );
                array_push($students["items"], $item);
            }
        
            echo json_encode($students);
        }else{
            echo json_encode(array('message' => 'No elements'));
        }
    }


    function getLatestPoints(){

        $points_class = new Points();
        $points = array();
        $points["items"] = array();

        $res = $points_class->getLatestPoints();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "points_by_day" => $row['points_by_day'],
                    "point_date" => $row['point_date']
                );
                array_push($points["items"], $item);
            }
        
            echo json_encode($points);
        }else{
            echo json_encode(array('message' => 'No elements'));
        }
    }

    function getPointsHistory(){

        $points_class = new Points();
        $points = array();

        $res = $points_class->getAllPoints();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "points_by_day" => $row['points_by_day'],
                    "point_date" => $row['point_date']
                );
                array_push($points, $item);
            }
        
            echo json_encode($points);
        }else{
            echo json_encode(array('message' => 'No elements'));
        }
    }

    function getWeekPointsCount(){

        $points_class = new Points();
        $res = $points_class->getWeekPoints();
        if($res->rowCount()){           
            echo json_encode($res->fetch(PDO::FETCH_ASSOC));
        }else{
            echo json_encode(array('message' => 'No elements'));
        }
    }

    function setNewDay($n_subj, $n_att){
        $student_class = new Student();
        $res1 = $student_class->setNewDay($n_subj, $n_att);
        $points_class = new Points();
        $res2 = $points_class->addNewRecord();
        return  array($res1, $res2);
    }

    function add_point_attitude($attitude_id){
        $student_class = new Student();
        $res1 = $student_class->add_point_attitude_student($attitude_id);
        $points_class = new Points();
        $res2 = $points_class->add_point_attitude_points();
        return  array($res1, $res2);
    }
}

?>