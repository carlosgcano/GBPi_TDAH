
<?php

include_once 'db_config.php';

class Pelicula extends DB{
    
    function obtenerPeliculas(){
        $query = $this->connect()->query('SELECT * FROM gbpi_web');
        return $query;
    }

}

?>