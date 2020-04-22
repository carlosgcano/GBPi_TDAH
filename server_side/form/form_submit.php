<?php

$host       = "127.0.0.1";
$db_name    = "gbpi";
$username   = "root";
$password   = "";
$connection = null;
try {
    $connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $connection->exec("set names utf8");
}
catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

function saveData($n_subj, $n_act, $n_medal, $n_trophy)
{
    global $connection;
    
    $query = "UPDATE `gbpi`.`gbpi_web` SET `n_subj` = '$_POST[n_subj]', `n_act` = '$_POST[n_act]', `n_medal` = '$_POST[n_medal]', `n_trophy` = '$_POST[n_trophy]' WHERE `gbpi_web`.`student_name` = 'student1'";
    
    $callToDb = $connection->prepare($query);
    $n_subj   = htmlspecialchars(strip_tags($n_subj));
    $n_act    = htmlspecialchars(strip_tags($n_act));
    $n_medal  = htmlspecialchars(strip_tags($n_medal));
    $n_trophy = htmlspecialchars(strip_tags($n_trophy));
    
    if ($callToDb->execute()) {
        
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

if (isset($_POST['submit'])) {
    
    $n_subj   = htmlentities($_POST['n_subj']);
    $n_act    = htmlentities($_POST['n_act']);
    $n_medal  = htmlentities($_POST['n_medal']);
    $n_trophy = htmlentities($_POST['n_trophy']);
    
    $result = saveData($n_subj, $n_act, $n_medal, $n_trophy);
    
    echo $result;
} else {
    echo '<h3 style="text-align:center;">A very detailed error message</h3>';
}

?> 