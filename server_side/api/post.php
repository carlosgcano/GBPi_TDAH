<?php

include_once 'db_config.php';

class Student extends DB{
    
    function getStudents(){
        $query = $this->connect()->query('SELECT * FROM gbpi_web');
        return $query;
    }

    function setNewDay($n_subj, $n_att){

        $subject_status = rtrim(str_repeat("grey,", $n_subj) , ",");
        $attitude_status = rtrim(str_repeat("grey,", $n_att) , ",");    

        $query = $this->connect()->query("UPDATE `gbpi_web` 
                                          SET `subject_status`='".$subject_status."',`attitude_status`='".$attitude_status."' 
                                          WHERE `student_name`= 'student1'");
        return $query;
    }

    function add_point_attitude_student($att_id){
        $res=false;
        $json1 = file_get_contents('http://localhost/api/'); 
        $student_data = json_decode($json1);
        $attitude_status = $student_data->items[0]->attitude_status;
        $attitude_status = explode(",", $attitude_status);
        if ($attitude_status[intval($att_id)]!="green"){
          $replace = array(intval($att_id) => "green"); 
          $attitude_status = array_replace($attitude_status, $replace);
          $attitude_status = implode(",", $attitude_status);
          $res = $this->connect()->query("UPDATE `gbpi_web` 
                                          SET `attitude_status`='".$attitude_status."' 
                                          WHERE `student_name`= 'student1'");
        }
        return $res;
    }



}

class Points extends DB{
    
    function getLatestPoints(){
        $query = $this->connect()->query('SELECT points_by_day, point_date
        								   FROM points 
        								   ORDER BY id_points DESC
        								   LIMIT 1;');
        return $query;
    }

    function addNewRecord(){
        $query = $this->connect()->query('INSERT INTO `points`(`points_by_day`) VALUES (0);');
        return $query;
    }

    function getAllPoints(){
        $query = $this->connect()->query('SELECT points_by_day, point_date 
                                          FROM `points` 
                                          WHERE point_date BETWEEN (CURRENT_DATE() - INTERVAL 2 MONTH) AND CURRENT_DATE() 
                                          ORDER BY point_date'
                                          );

        return $query;
    }

    function getWeekPoints(){
        $query = $this->connect()->query('SELECT SUM(points_by_day) 
                                          AS "Total_Week_Points"
                                          FROM points 
                                          WHERE WEEK(point_date,1) = (SELECT WEEK(point_date,1) 
                                                                      FROM points 
                                                                      ORDER BY id_points 
                                                                      DESC LIMIT 1)');
        return $query;
    }
    function add_point_attitude_points(){
        $query = $this->connect()->query("UPDATE `points` 
                                          SET `points_by_day`=`points_by_day`+1 
                                          ORDER BY id_points DESC
                                          LIMIT 1");
        return $query;
    }
}

?>