<!doctype html>
<html lang="en">
<head>
    <title>Pi4Attention</title>  
    <link rel="icon" href="images/pi4logo-icon.png">  
    <link rel="stylesheet" href="css/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <?php
    readfile("sidebar.php");
    ?>

    <div id="main">
        <div class="header">
            <h1>Ayuda</h1>
            <h2>¿Tienes problemas?</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">¿Cómo usar esta web?</h2>
            <p>
               Si eres padre o tutor, a continuación te explicamos lo sencillo que es utilizar el servicio Pi4Attention.
            </p>

            <h2 class="content-subhead">Puntuaciones</h2>
            <p>
                En la pantalla "Puntuación" se añade la puntuación del alumno respecto a las asignaturas que ha realizado en el día. Según haya sido su comportamiento en clase, debe ser su puntuación, para asignarla sólo es necesario pulsar en cada una de las secciones, al momento cambiará de color y dependiendo del color tendrá una puntuación u otra.
                <br>
                - Verde = 2 puntos.
                <br>
                - Amarillo = 1 puntos.
                <br>
                - Rojo = 0 puntos.
            </p>
            
            <h2 class="content-subhead">Estadísticas</h2>
            <p>
                Pulsando sobre "Estadísticas" se mostrará una página con la puntuación actual del niño y un histórico de puntos conseguidos en días anteriores.
            </p>
            <h2 class="content-subhead">Preferencias</h2>
            <p>
                En la sección "Preferencias", el usuario podrá cambiar las opciones actuales. Entre ellas:
                <br>
                - Número de asignaturas que tioene el alumno.
                <br>
                - Número de actividades de mejora de actitud que tiene el alumno.
                <br>
                - Número de puntos que hacen falta para conseguir una medalla.
                <br>
                - Número de medallas que hacen falta para conseguir un trofeo.
                <br>
                - Tiempo máximo que el alumno puede jugar con el dispositivo portatil "Pi4Attention"
            </p>            
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>
</html>