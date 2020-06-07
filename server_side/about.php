<!doctype html>
<html lang="en">
<head>
    <title>GBpi Server</title>    
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
 
            
            <div class="pure-u-1-3">
                <h2>El autor</h2>
                <img src="images/about.jpg" alt="Avatar" style="width:200px; border-radius: 50%;">
                <h3>Carlos Gómez Cano</h3>
            </div>
            <div class="pure-u-1-3">
                <h2>El proyecto</h2>
                <img src="images/pi4logo.png" alt="Avatar" style="width:200px; border-radius: 50%;">
                <h3>Pi 4 Attention</h3>
            </div>
        </div>

        <div class="content">
            <h2 class="content-subhead">About</h2>
            <p>
                Proyecto para el máster de Ingeniería Informática de la universidad Pablo de Olavide. Sevilla. 2020
            </p>

            <p>
                "Pi 4 Attention" es un proyecto que quiere servir de apoyo a familias y profesores de niños con problemas por trastorno de déficit de atención e hiperactividad.
            </p>
            <p>
                 Sirviéndonos del concepto de Internet de las cosas y de la atractividad que presentan los videojuegos para los niños hemos creado una infraestructura que los haga conscientes de su propio trastorno y los ayude a superarse y valerse por si mismos.
            </p>
            <p>
                 Como ejemplo para otros proyectos alternativos a este, todo el software utilizado está basado en filosofías de código abierto. 
                 Para más información se puede acceder al repositorio de código compartido: 
            <div class="githublogo">
                <a  href="https://github.com/carlosgcano/GBPi_TDAH">
                    <img src="images/github-logo.png" alt="Github-logo" style="width:50px;"> @CARLOSGCANO
                </a>
            </div> 
            </p>
       
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>
</html>