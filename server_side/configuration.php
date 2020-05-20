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

    $_SESSION['ref'] = $_SERVER['SCRIPT_NAME'];
    ?>

    <div id="main">
        <div class="header">
            <h1>Configurations</h1>
        </div>

        <div class="content">
            <h2 class="content-subhead">How to use this layout</h2>
            <div class="pure-g">
                <form action="form/form_submit.php" class="alt" method="POST">
                    <div class="row uniform">
                    <div class="n_subj">
                    <input name="n_subj" placeholder="Asignaturas" type="number" min="1" max="10" required>
                    </div>                    
                    <div class="n_act">
                    <input name="n_act" placeholder="Actitudes" type="number" min="1" max="10" required>
                    </div>
                    <div class="n_medal">
                    <input name="n_medal" placeholder="Medallas" type="number" min="1" max="10" required>
                    </div>
                    <div class="n_trophy">
                    <input name="n_trophy" placeholder="Trofeos" type="number" min="1" max="10" required>
                    </div>    
                    <div class="game_time">
                    <input name="game_time" placeholder="Tiempo de juego" type="number" min="1" max="60" required>
                    </div>                 
                    </div>
                    <br/>
                    <input class="alt" value="Submit" name="submit" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>
</html>