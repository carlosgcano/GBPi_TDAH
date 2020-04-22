
<?php

include_once 'db_config.php';

class Student extends DB{
    
    function getStudents(){
        $query = $this->connect()->query('SELECT * FROM gbpi_web');
        return $query;
    }

}

?>