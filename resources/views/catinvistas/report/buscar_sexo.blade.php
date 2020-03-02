@extends('layouts.app')
  @section('content')
<table align="center">
    <tr>
        <td>
            <div id="chart_3d" style="width: 700px; height: 400px;">
            </div>
        </td>
    </tr>
</table>
<div class="contrainer">
    <div class="table-responsive">
        <div class="panel-default">
            <div class="panel-body panel-resizable">
                <hr>
                    <div class="panel panel-primary active in">
                        <div class="panel-heading">
                            Listado de Voluntarios por Genero
                        </div>
                        @if(count($datos)>=1)
                        <?php $countt=0; ?>
                        <table class="table table-hover table-sm table-responsive" id="example">
                            <thead>
                                <tr class="active">
                                    <th>
                                        Código
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Sexo
                                    </th>
                                    <th>
                                        Fecha Nacimiento
                                    </th>
                                    <th>
                                        Mes Cumpleaños
                                    </th>
                                    <th>
                                        Dirección
                                    </th>
                                    <th>
                                        DUI
                                    </th>
                                    <th>
                                        Categoria
                                    </th>
                                    <th>
                                        Horario
                                    </th>
                                    <th>
                                        Institución
                                    </th>
                                    <th>
                                        Carrera
                                    </th>
                                    <th>
                                        Horas Requeridas
                                    </th>
                                    <th>
                                        Horas Realizadas
                                    </th>
                                    <th>
                                        Contacto
                                    </th>
                                    <th>
                                        Telefono Contacto
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="active">
                                    <th>
                                        Código
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Sexo
                                    </th>
                                    <th>
                                        Fecha Nacimiento
                                    </th>
                                    <th>
                                        Mes Cumpleaños
                                    </th>
                                    <th>
                                        Dirección
                                    </th>
                                    <th>
                                        DUI
                                    </th>
                                    <th>
                                        Categoria
                                    </th>
                                    <th>
                                        Horario
                                    </th>
                                    <th>
                                        Institución
                                    </th>
                                    <th>
                                        Carrera
                                    </th>
                                    <th>
                                        Horas Requeridas
                                    </th>
                                    <th>
                                        Horas Realizadas
                                    </th>
                                    <th>
                                        Contacto
                                    </th>
                                    <th>
                                        Telefono Contacto
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($datos as $row)
                                <?php  $countt=$countt+1; ?>
                                <tr>
                                    <td>
                                        {{$row->codigo}}
                                    </td>
                                    <td>
                                        {{$row->nombre}}
                                    </td>
                                    <td>
                                        {{$row->sexo}}
                                    </td>
                                    <td>
                                        {{$row->f_nacimiento}}
                                    </td>
                                    <td>
                                        {{$row->mes_cumpleanio}}
                                    </td>
                                    <td>
                                        {{$row->direccion}}
                                    </td>
                                    <td>
                                        {{$row->dui}}
                                    </td>
                                    @if($row->concepto=="1")
                                    <td>
                                        Servicio Social
                                    </td>
                                    @endif
                @if($row->concepto=="2")
                                    <td>
                                        Voluntariado
                                    </td>
                                    @endif
                @if($row->concepto=="3")
                                    <td>
                                        Seminario
                                    </td>
                                    @endif
                 @if($row->concepto=="4")
                                    <td>
                                        Beca al Servicio
                                    </td>
                                    @endif
                @if($row->concepto=="5")
                                    <td>
                                        Beca de Idiomas
                                    </td>
                                    @endif
                @if($row->concepto=="6")
                                    <td>
                                        Eventual
                                    </td>
                                    @endif
                                    <td>
                                        {{$row->horario}}
                                    </td>
                                    <td>
                                        {{$row->id_institucion}}
                                    </td>
                                    <td>
                                        {{$row->carrera_opcion}}
                                    </td>
                                    <td>
                                        {{$row->horas_requeridas}}
                                    </td>
                                    <td>
                                        {{$row->horas_realizar}}
                                    </td>
                                    <td>
                                        {{$row->contacto}}
                                    </td>
                                    <td>
                                        {{$row->tel_contacto}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        Total Datos:
                        <?php  echo $countt; ?>
                        @else
                        <div class="alert alert-warning">
                            <strong>
                                Ooops!
                            </strong>
                            No hay registros que mostrar.
                        </div>
                        @endif
                    </div>
                </hr>
            </div>
        </div>
    </div>
    
    <script>
    $(document).ready(function() {

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar" >' );
    });

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [

            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'print',
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                autoWidth: true
             }  
        ],
          'iDisplayLength': 50, 
          'responsive': true,
         'scrollY': 200,
         'scrollX': true,
         'destroy': true
       

    });
 
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
          ['Sexo', 'Cantidad'],

           @foreach ($datos2 as $g)
          <?php

           
                 $sexo=$g->sexo;
              
               if($sexo=="f")
                   $sexo="Femenino";
               
                if($sexo=="m")
                   $sexo="Masculino";
              
                if($sexo=="F")
                   $sexo="Femenino";
               
                if($sexo=="M")
                   $sexo="Masculino";

                

         ?>
  

            ["{{$sexo }}",{{ $g->cantidad_sexo}}],    
           @endforeach
         
        ]);

        var options = {
          
          title: 'GRAFICA DETALLE POR GENERO',
        legend: { position: 'none' },
       
          is3D: true,
          colors:['skyblue','orange','#004411'],
          //vAxis: { ticks: [ 10, 25, 50, 75, 100 ] }
            vAxis: { viewWindow: { min: 1, max: 25 } },
            vAxis: {title: "Cantidad"}, //Bar of Pie Charts
           hAxis: {title: "Sexo"}, //Bar of Pie Charts

        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_3d'));
        chart.draw(data, options);


         
      }
    </script>
    @endsection
</div>