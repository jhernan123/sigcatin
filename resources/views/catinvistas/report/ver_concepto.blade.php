  @extends('layouts.app')
  @section('content')

<table align="center">
    <tr>
        <td> <div id="chart_3d" style="width: 700px; height: 400px;"></div></td>
        
    </tr>
</table>

<div class="container">

    <div class="panel-body">

    <hr>
    
   <div class="panel panel-primary active in" >
         <div class="panel-heading">
               Lista de Inscritos por Concepto
            </div>
            
        @if($datos)
         <?php $countt=0; ?>
        <table id="example"   class="table table-hover" >
            <thead>
                <tr class="active">
                    <th>Cantidad</th>
                    <th>Concepto</th>
                    <th>Detalle</th>
                </tr>
            </thead>


            <tfoot>
  <tr class="active">
       
                    <th>Cantidad</th>
                    <th>Concepto</th>
                    <th>Detalle</th>
                </tr>
</tfoot>
            <tbody>

                @foreach($datos as $row)
<?php  $countt=$countt+$row->cantidad_concepto; ?>
                <tr>
                    <td>{{$row->cantidad_concepto}}</td>
                 @if($row->concepto=="1")
                   <td>Servicio Social</td>
                @endif
                @if($row->concepto=="2")
                   <td>Voluntariado</td>
                @endif
                @if($row->concepto=="3")
                   <td>Seminario</td>
                @endif

                 @if($row->concepto=="4")
                   <td>Beca al Servicio</td>
                @endif
                @if($row->concepto=="5")
                   <td>Beca de Idiomas</td>
                @endif
                @if($row->concepto=="6")
                   <td>Eventual</td>
                @endif

<td><a href="{{route('concepto.show',$row->concepto)}}" class="btn btn-info">Ver</a></td>





                </tr>
           
                   @endforeach
                    </tbody>
  <tr><td>Total datos: <?php  echo $countt; ?>   </td></tr>
        </table>
        @else
        <div class='alert alert-warning'>
        <strong>Ooops!</strong> No hay registros que mostrar.
    </div>

        @endif


    </div>
    </div> 
  </div>

    <script>
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5','print',
            
        ]
    } );

$("#example_filter").attr('style','display:none');
$("#example_paginate").attr('style','display:none');
$("#example_info").attr('style','display:none');

} );

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );


  </script>



   <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
      var data = google.visualization.arrayToDataTable([
          ['Carreras', 'Cantidad'],

           @foreach ($datos as $g)
          <?php

              if($g->concepto=="1")
                   $nombre="Servicio Social";
              
                if($g->concepto=="2")
                   $nombre="Voluntariado";
               
                if($g->concepto=="3")
                   $nombre="Seminario";
              

                 if($g->concepto=="4")
                   $nombre="Beca al Servicio";
                
                if($g->concepto=="5")
                   $nombre="Beca de Idiomas";
                
                if($g->concepto=="6")
                   $nombre="Eventual";
                

         ?>
  

            ["{{$nombre }}",{{ $g->cantidad_concepto}}],    
           @endforeach
         
        ]);

        var options = {
          
          title: 'GRAFICA DETALLE POR CONCEPTO',
        legend: { position: 'none' },
       
          is3D: true,
          colors:['skyblue','orange','#004411'],
          //vAxis: { ticks: [ 10, 25, 50, 75, 100 ] }
            vAxis: { viewWindow: { min: 1, max: 25 } },
            vAxis: {title: "Cantidad"}, //Bar of Pie Charts
           hAxis: {title: "Conceptos"}, //Bar of Pie Charts

        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_3d'));
        chart.draw(data, options);


         
      }
    </script>



    @endsection
