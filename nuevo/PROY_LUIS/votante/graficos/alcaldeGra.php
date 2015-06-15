<?php  include './clases/coneccion.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>RESULTADOS EN LINIA</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Elecciones Alcaldes y Consejos Municipales'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Candidato a alcande',
            data: [
            <?php  $db = new conect_Mysql();
            $sql= "SELECT * FROM  alcaldes";
              $que = $db->execute($sql);
              while ($row= $db-> fetch_row($que)){ ?>
                ['<?php echo $row['partido'] ?>',  <?php echo $row['clicks'] ?>],
              <?php  } ?>
              ]
        }]
    });
});


        </script>
    </head>
    <body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
     
<a href="voto.php" class="button blue"> RESULTADOS</a>

    </body>
</html>
