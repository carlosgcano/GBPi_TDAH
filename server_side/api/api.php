<?php

include_once 'post.php';

class Api{


    function getAll(){
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPeliculas();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "nombre" => $row['name'],
                    //"email" => $row['email'],
                    //"message" => $row['message'],
                );
                array_push($peliculas["items"], $item);
            }
        
            echo json_encode($peliculas);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}

?>