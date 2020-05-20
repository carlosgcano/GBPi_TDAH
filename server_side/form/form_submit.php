<?php
$host       = "127.0.0.1";
$db_name    = "gbpi";
$username   = "root";
$password   = "";
$connection = null;
try
{
    $connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $connection->exec("set names utf8");
}
catch(PDOException $exception)
{
    echo "Connection error: " . $exception->getMessage();
}

function saveData($n_subj, $n_act, $n_medal, $n_trophy, $subject_status,$attitude_status,$game_time)
{
    global $connection;

    $query = "  UPDATE `gbpi`.`gbpi_web` 
                SET `n_subj`='$n_subj',
                    `n_act`='$n_act',
                    `n_medal`='$n_medal',
                    `n_trophy`='$n_trophy',
                    `subject_status`='$subject_status',
                    `attitude_status`='$attitude_status',
                    `game_time`='$game_time'
                WHERE `gbpi_web`.`student_name`='student1'";

    $callToDb = $connection->prepare($query);

    if ($callToDb->execute())
    {

        return '
            <html>
                <head>
                    <script language="JavaScript">
                        var time = null
                        function move() {
                            window.location = "http://localhost/configuration.php";
                        }
                    </script>
                </head>
                <body onload="timer=setTimeout(\'move()\',1000)">
                    <h2>Información modificada correctamente</h2>
                </body>
            </html>
        ';
    }
}

function saveSubjectStatus($json)
{
    global $connection;
    //Conversion de Json de PHP
    $data=json_decode($json, true);
    //Incluimos el array con los colores actualizados a la tabla gbpi_web
    $subject_status = implode(",", $data[0]);
    $query = "UPDATE `gbpi`.`gbpi_web` 
              SET `subject_status` = '$subject_status' 
              WHERE `gbpi_web`.`student_name` = 'student1'";
    $callToDb = $connection->prepare($query);
    $result = $callToDb->execute();
    //Incluimos los puntos actualizados a la tabla points. 
    //Verde vale 2 puntos, Amarillo vale 1 punto y rojo vale 0
    $green=$data[1][0];
    $yellow=$data[1][1];
    //$red=$data[1][3];
    $points = $green*2+$yellow;
    echo '"<br>"datos:'.implode(",", $data[1])."<br>";
    echo '"<br>"verde:'.$green."<br>";
    echo 'ama:'.$yellow."<br>";
    echo 'total:'.$points."<br>";
    $query = "UPDATE `gbpi`.`points` 
              SET `points_by_day` = '$points' 
              ORDER BY `id_points` DESC LIMIT 1";
    echo '"<br>"consulta:'.$query."<br>";          
    $callToDb = $connection->prepare($query);
    $result = $callToDb->execute();
    echo "resultado:";
    var_dump($result);
}

if (isset($_POST['submit']))
{
    $n_subj     = $_POST['n_subj'];
    $n_act      = $_POST['n_act'];
    $n_medal    = $_POST['n_medal'];
    $n_trophy   = $_POST['n_trophy'];
    $subject_status = rtrim(str_repeat("grey,", $n_subj) , ",");
    $attitude_status = rtrim(str_repeat("grey,", $n_act) , ",");
    $game_time   = $_POST['game_time'];
    $result = saveData($n_subj, $n_act, $n_medal, $n_trophy, $subject_status,$attitude_status,$game_time);
    echo $result;
}
elseif (isset($_POST['slice_colors']))
{
    $subject_status = $_POST['slice_colors'];
    $result = saveSubjectStatus($subject_status);
}
else
{
    echo '<h3 style="text-align:center;">Error</h3>';
}

?>
