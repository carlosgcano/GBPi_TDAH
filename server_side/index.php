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
    $json = file_get_contents('http://localhost/api/');      
    $data = json_decode($json); 

    $subjects=$data->items[0]->n_subj;
    $percent=100/$subjects;
    echo "var subject_pie = [ ";
    for  ($i = 1; $i <= $subjects; $i++) {  
        echo "{\"category\": ".$i.",
                \"value\": ".$percent.",
                \"userColor\": \"grey\"
            },";
    }
    echo "];";
    ?>
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

  		<div id="chart"></div>

            <button type="submit" form="subject_puntuation_form" value="Submit">Submit</button>
        </div>

    </div>

</div>
    <script src="js/points_assign.js"></script>
    <script src="js/ui.js"></script>

</body>
</html>
