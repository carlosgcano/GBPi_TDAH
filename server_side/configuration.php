<!doctype html>
<html lang="en">
<head>
    <title>Pi4Attention</title>    
    <link rel="icon" href="images/pi4logo-icon.png">
    <link rel="stylesheet" href="css/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form_style.css">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <?php
    readfile("sidebar.php");

    $_SESSION['ref'] = $_SERVER['SCRIPT_NAME'];
    ?>

    <div id="main">
        <div class="header">
            <h1>Preferencias</h1>
        </div>
        <div class="content">
            <div class="pure-u-1-1">
                <form class="form-style-7" action="form/form_submit.php" method="POST">
                    <ul>
                    <li>
                        <label for="n_subj">Número de asignaturas</label>
                        <input type="number" name="n_subj" min="1" max="8" required>
                        <span>Inserta el número de asignaturas que tendrá el alumno.</span>
                    </li>
                    <li>
                        <label for="n_act">Actitudes</label>
                        <input type="number" name="n_act" min="1" max="6" required>
                        <span>Inserta el número de actividades actitudinales que tendrá el niño.</span>
                    </li>
                    <li>
                        <label for="n_medal">Medallas</label>
                        <input type="number" name="n_medal" min="1" max="10" required>
                        <span>Puntos por medalla</span>
                    </li>
                    <li>
                        <label for="n_trophy">Copas</label>
                        <input type="number" name="n_trophy" min="1" max="10" required>
                        <span>Copas por medalla</span>
                    </li>
                    <li>
                        <label for="game_time">Tiempo</label>
                        <input type="number" name="game_time" min="1" max="60" required>
                        <span>Tiempo máximo de juego</span>
                    </li>
                    <li>
                        <input class="alt"type="submit" value="Enviar" name="submit">
                    </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>
</html>