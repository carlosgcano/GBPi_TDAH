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
    ?>
    </script>

    <div id="main">
        <div class="header">
            <h1>Stats</h1>
            <h2>Statistics from the actitud and subjects</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">How to use this layout</h2>
            <p>
                To use this layout, you can just copy paste the HTML, along with the CSS in <a href="/css/layouts/side-menu.css" alt="Side Menu CSS">side-menu.css</a>, and the JavaScript in <a href="/js/ui.js">ui.js</a>. The JS file uses vanilla JavaScript to simply toggle an <code>active</code> class that makes the menu responsive.
            </p>

            <h2 class="content-subhead">Try Resizing your Browser</h2>
            <p>
                <div class="pure-g">
                <div class="pure-u-1-2" id="chart_subjects_stats"></div>
                <div class="pure-u-1-2" id="chart_attitudes_stats"></div>
                </div>
            </p>
        </div>
    </div>
</div>

<script src="js/pie_chart_config.js"></script>
<script src="js/ui.js"></script>

</body>
</html>