<!doctype html>
<html lang="en">
<head>
    <title>GBpi Server</title>    
    <link rel="stylesheet" href="css/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layouts/side-menu.css">

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <?php
    readfile("sidebar.php");
    ?>
        <script language='javascript'>
    <?php
        //Obtencion de datos de colores
        $json = file_get_contents('http://localhost/api/');      
        $data = json_decode($json); 
        $json1 = file_get_contents('http://localhost/api/points/getPointsHistory.php');      
        $data_line_chart = json_decode($json1); 

        //Colores grafico subjects
        $colors = explode(",", $data->items[0]->subject_status);
        $subjects = $data->items[0]->n_subj;
        $percent = 100/$subjects;
        echo "var subject_pie = [ ";
        for  ($i = 1; $i <= $subjects; $i++) {  
            echo "{\"category\": ".$i.",
                    \"value\": ".$percent.",
                    \"userColor\": \"".$colors[$i-1]."\"
                },";
        }
        echo "];";

        //Colores grafico attitudes
        $colors = explode(",", $data->items[0]->attitude_status);
        $attitudes = $data->items[0]->n_act;
        $percent = 100/$attitudes;
        echo "var attitudes_pie = [ ";
        for  ($i = 1; $i <= $attitudes; $i++) {  
            echo "{\"category\": ".$i.",
                    \"value\": ".$percent.",
                    \"userColor\": \"".$colors[$i-1]."\"
                },";
        }
        echo "];";

        //Datos grafico puntuacion           
        $aux_score='';    
        $aux_date=''; 
        foreach ($data_line_chart as $key) {
            $aux_score=$aux_score.$key->points_by_day.',';            
            $aux_date=$aux_date."\"".$key->point_date."\",";
        }
        echo "var score_chart = [".rtrim($aux_score, ",")."];";
        echo "var score_date_chart = [".rtrim($aux_date, ",")."];"; 
        
        
    ?>
    </script>

    <div id="main">
        <div class="header">
            <h1>Estadísticas</h1>


            <h2 class="content-subhead">Estado del alumno</h2>
            <p>
                <div class="pure-g">
                <div class="pure-u-1-2" id="chart_subjects_stats"></div>
                <div class="pure-u-1-2" id="chart_attitudes_stats"></div>
                </div>
            </p>

            <h2 class="content-subhead">Puntuaciones conseguidas por día</h2>
            <p>
                <div class="pure-g">
                <div class="pure-u-1-1" id="chart_score_week"></div>
                
                </div>
            </p>



        </div>
    </div>
</div>


<script src="js/pie_chart_config.js"></script>
<script src="js/line_chart_config.js"></script>
<script src="js/ui.js"></script>

</body>
</html>