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

function saveData($n_subj, $n_act, $n_medal, $n_trophy, $subject_status)
{
    global $connection;

    $query = "  UPDATE `gbpi`.`gbpi_web` 
                SET `n_subj`='$n_subj',`n_act`='$n_act',`n_medal`='$n_medal',`n_trophy`='$n_trophy',`subject_status`='$subject_status' 
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

function saveSubjectStatus($data)
{
    global $connection;
    $subject_status = implode(",", $data);
    $query = "UPDATE `gbpi`.`gbpi_web` 
              SET `subject_status` = '$subject_status' 
              WHERE `gbpi_web`.`student_name` = 'student1'";
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
    $result = saveData($n_subj, $n_act, $n_medal, $n_trophy, $subject_status);
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
