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
//var_dump($query);
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

}

?>