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

    function add_point_attitude_student($att){
        $aux=substr_count($att, 'green');
        $aux2=substr_count($att, 'grey');
        $attitude_status = rtrim(str_repeat("green,", $aux+1).str_repeat("grey,", $aux2-1) , ",");    
        $query = $this->connect()->query("UPDATE `gbpi_web` 
                                          SET `attitude_status`='".$attitude_status."' 
                                          WHERE `student_name`= 'student1'");
        return $query;
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
                                           FROM points 
                                           ORDER BY point_date;');
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