<!doctype html>
<html lang="en">
<head>
    <?php
    //Inicializacion nuevo dia
    $json_points = file_get_contents('http://localhost/api/points');
    $student_points = json_decode($json_points);      
    $last_date = date('Y/m/d', strtotime( $student_points->items[0]->point_date));
    if (date("Y/m/d")  > $last_date){
        file_get_contents('http://localhost/api/points/setNewDay.php');
    }
    ?>

    <title>Pi4Attention</title> 
    <link rel="icon" href="images/pi4logo-icon.png">   
    <link rel="stylesheet" href="css/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="stylesheet" href="css/form_style.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
</head>
<body>

<div id="layout">
    <?php
        readfile("sidebar.php");
    ?>

    <script language='javascript'>
    <?php
        $json1 = file_get_contents('http://localhost/api/'); 
        $student_data = json_decode($json1);
        $labels = array( "Matemáticas", "Lengua", "Inglés", "Naturales", "Francés", "Plástica", "Gimnasia", "Religión" );
        $colors = explode(",", $student_data->items[0]->subject_status);
        $subjects = $student_data->items[0]->n_subj;
        $percent = 100/$subjects;
        echo "var subject_pie = [ ";
        for  ($i = 1; $i <= $subjects; $i++) {  
            echo "{\"category\": \"".$labels[$i-1]."\",
                    \"value\": ".$percent.",
                    \"userColor\": \"".$colors[$i-1]."\"
                },";
        }
        echo "];";

    ?>
    </script>
    <script>
        function post_slice_colors(){
                var parametros = get_slice_colors();
                
                var myJSONText = JSON.stringify( parametros );
                console.log(myJSONText);
                $.ajax({
                        type: "POST", 
                        url: "form/form_submit.php", 
                        data: { slice_colors : parametros}, 
                        beforeSend: function () {
                                $("#resultado").html("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                                $("#resultado").html(response);
                        }
                });
        }
    </script>

    <div id="main">
        <div class="header">
            <h1>Puntuación</h1>
            <h2>¿Cómo fue su comportamiento en clase?</h2>
        </div>
        <div class="content">
            <div class="pure-u-1-1">
                <div id="chart_subjects_index"></div>
                    <div class="pure-u-2-3">
                        <button class="form-style-7" type="submit" onclick="post_slice_colors()">Enviar</button>                        
                        <span id="resultado"></span>
                    </div>
            </div>
        </div>

    </div>

</div>

    <script src="js/pie_chart_config.js"></script>
    <script src="js/ui.js"></script>

</body>
</html>







