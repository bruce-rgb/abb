<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arbol</title>
        <script type="text/javascript" src="loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {packages:["orgchart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');    //Nombre
            data.addColumn('string', 'Manager'); //Padre
            data.addColumn('string', 'ToolTip'); //
            // For each orgchart box, provide the name, manager, and tooltip to show.
            data.addRows([
              <?php
                
              include_once 'Arbol.php';
              $arbol = new Arbol();
              $arbol->agregarNodo(5);
              $arbol->agregarNodo(4);
              $arbol->agregarNodo(3);
              $arbol->agregarNodo(3);
              $arbol->agregarNodo(5);
              $arbol->agregarNodo(9);
              $arbol->agregarNodo(8);
              $arbol->agregarNodo(11);
              $arbol->agregarNodo(15);
              $arbol->agregarNodo(14);
              $arbol->agregarNodo(100);

              $arbol->print();
              
                /* include_once 'NodoBinario.php';
                $nodo1 = new NodoBinario(5);
                $nodo2 = new NodoBinario(4);
                $nodo3 = new NodoBinario(3);
                $nodo4 = new NodoBinario(3);
                $nodo5 = new NodoBinario(5);
                $nodo6 = new NodoBinario(9);
                $nodo7 = new NodoBinario(8);
                $nodo8 = new NodoBinario(11);
                $nodo9 = new NodoBinario(15);
                $nodo10 = new NodoBinario(14);

                $nodo1->setIzquierdo($nodo2);
                $nodo2->setIzquierdo($nodo3);
                $nodo3->setIzquierdo($nodo4);
                $nodo2->setDerecho($nodo5);
                $nodo1->setDerecho($nodo6);
                $nodo6->setDerecho($nodo8);
                $nodo8->setDerecho($nodo9);
                $nodo6->setIzquierdo($nodo7);
                $nodo9->setIzquierdo($nodo10);
                
                $nodo1->mostrar();  
                
                */
              ?>
            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {'allowHtml':true,'size':'medium'});
          }
          function x(){
              alert('si funciona')
          }
       </script>
    </head>
    <body>
        <?php
            echo $arbol->minimo()->getValor(); 
            echo $arbol->maximo()->getValor();
            echo $arbol->buscarporValor(8)->getValor();
            
        ?> 
        <div id="chart_div"></div>
    </body>
</html>


<?php
        /*
        
        $nodox=$nodo8;
        echo "padre "; echo $nodox->getPadre()->getValor(); echo"<br>";
        echo "grado ";echo $nodox->grado(); echo"<br>";
        echo "nivel ";echo $nodox->nivel(); echo"<br>";
        echo "hijo ";echo $nodox->hijo(); echo"<br>";
        
        echo "padre "; echo $nodo2->getPadre()->getValor(); echo"<br>";
        echo "grado ";echo $nodo1->grado(); echo"<br>";
        echo "nivel ";echo $nodo1->nivel(); echo"<br>";
        echo "hijo ";echo $nodo1->hijo(); echo"<br>";
        
        echo $nodo2->getPadre()->getValor(); echo"<br>";
        
        $nodo1->setValor(3);
        echo $nodo1->getValor();
        
        $nodo1->setGrado(2);
        echo $nodo1->getGrado();
        
        $nodo1->setNivel(0);
        echo $nodo1->getNivel();
        
        $nodo1->setNivel(0);
        echo $nodo1->getNivel();
        */
?>