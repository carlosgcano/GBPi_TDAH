<?php
    include_once '../api.php';

    $api = new Api();
    $id = htmlspecialchars($_GET["id"]);
    $res=$api->add_point_attitude($id);

?>