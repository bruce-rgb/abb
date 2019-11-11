<!--https://developers.google.com/chart/interactive/docs/gallery/orgchart-->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
          [{'v':'Mike', 'f':'El crack<div style="color:red; font-style:italic" onclick="x()">President</div>'},
           '', 'The President'],
          [{'v':'Jim', 'f':'Jim<div style="color:red; font-style:italic">Vice President</div>'},
           'Mike', 'VP'],
          ['Alice', 'Mike', ''], //el primero es un id no se debe repetir valor+nivel
          ['Bob', 'Jim', 'Bob Sponge'],
          ['Carol', 'Bob', '']
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
    <div id="chart_div"></div>
  </body>
</html>



ad data rows{
    php
        print nodo
    php
}

