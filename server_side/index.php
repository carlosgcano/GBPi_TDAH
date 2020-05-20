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
        $json1 = file_get_contents('http://localhost/api/'); 
        $student_data = json_decode($json1);
       
        $colors = explode(",", $student_data->items[0]->subject_status);
        $subjects = $student_data->items[0]->n_subj;
        $percent = 100/$subjects;
        echo "var subject_pie = [ ";
        for  ($i = 1; $i <= $subjects; $i++) {  
            echo "{\"category\": ".$i.",
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
            <h1>Puntuations</h1>
            <h2>How was the behavour?</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">How to use this layout</h2>
            <p>
                To use this layout, you can just copy paste the HTML, along with the CSS in <a href="/css/layouts/side-menu.css" alt="Side Menu CSS">side-menu.css</a>, and the JavaScript in <a href="/js/ui.js">ui.js</a>. The JS file uses vanilla JavaScript to simply toggle an <code>active</code> class that makes the menu responsive.
            </p>

                <div id="chart_subjects_index"></div>
                <button onclick="post_slice_colors()">Enviar</button>
            Resultado: <span id="resultado">0</span>
        </div>

    </div>

</div>

    <script src="js/pie_chart_config.js"></script>
    <script src="js/ui.js"></script>

</body>
</html>







