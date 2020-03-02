@extends('layouts.app')
@section('content')

  <div align="center">
                <div class="panel panel-primary" >
                    <div class="panel-heading">
                       <strong> Graficas.</strong>
           <a type="button"  class="btn" onclick="panelout('#tblgraficas','#font1')"><font color="white" id="font1" title="Haz Click para ocultar o Mostrar las Graficas">-</font></a>
                    </div>
                 
</div>
</div>
<table class="table-responsive table panel" id="tblgraficas" >
    <tr align="center">
        <td>
            <div id="piechart_3d" style="width: 700px; height: 500px;"></div></td>
        <td> 
            <div id="piechart_3d2" style="width: 700px; height: 500px;"></div></td>
    </tr>
</table>

          

@if ((count($datos)>0))

<div class="col-md-12 panel" >
    <div class="">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Voluntarios Registrados.
            </div>
            <div class="panel-body" id="contenido">
                <div class="table-responsive" >
                    <table class="table table-hover " id="example">
                    <thead>
                        <tr class="active">
                            <th>
                                Código
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Institución Académica
                            </th>
                            <th>
                                Condición
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                                 Opciones
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
                                Institución Académica
                            </th>
                            <th>
                                Condición
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                               Opciones
                            </th>                          
                        </tr>
                         </tfoot>
                        <tbody>
                       
                        @foreach ($datos as $d)
                        <tr>
                            <td>
                                {{$d->codigo}}
                            </td>
                            <td>
                                {{$d->nombre}}
                            </td>
                            <td>
                                {{$d->id_institucion}}
                            </td>
                            <td>
                                {{$d->condicion}}
                            </td>
                            <td>
                                {{$d->estado}}
                            </td>
                            <td>
                                <div class="form-group">
                                    <a class="btn btn-warning" href="{{route('voluntarios.edit',$d->id_voluntario)}}" type="button">
                                        Editar
                                    </a>
                                    <button class="btn btn-default borrado" data-target="#modalpreguntar" data-toggle="modal" value="{{route('borrar',$d->id_voluntario)}}" nombre="{{$d->nombre}}">
                                        Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--
                       <div>{{$datos->appends(Request::except('page'))->links()}}</div>   -->

                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-dismissible alert-info" role="alert" style="display">
    <center>
        <strong>
            No hay registros!
        </strong>
    </center>
</div>
@endif





<!-- modals -->
<div aria-labelledby="modalpreguntar" class="modal fade" id="modalpreguntar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h8 class="modal-title">
                    Seguro de eliminar este registro?
                </h8>
            </div>
            <form action="" id="modalform" method="POST">
                <div class="modal-body">
                    <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="Delete">
                            <strong>
                                <div id="nombremodal"></div>
                            </strong>
                        </input>
                    </input>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="submit" id="modal-btn-si" type="button">
                        Si
                    </button>
                    <button class="btn btn-primary" data-dismiss="modal" id="modal-btn-no" type="button">
                        No
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
   

$('.borrado').click(function(){
    var ruta = $(this).val();
    var nombre = $(this).attr('nombre');
    $('form#modalform').attr('action',ruta);
    $('#nombremodal').html(nombre);
});

 $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel','print',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape'    
             }  
        ]
    });
$("#example_filter").attr('style','display');
$("#example_paginate").attr('style','display');
$("#example_info").attr('style','display');
   
 });



 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar" />' );
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
           @foreach ($carvolunt as $g)
            ["{{$g->carrera_opcion }}",{{ $g->cantidad }}],    
           @endforeach
         
        ]);

        var options = {
          title: 'Voluntarios por Carrera',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


 
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
      var data = google.visualization.arrayToDataTable([
          ['Iinstituciones', 'Cantidad'],
           @foreach ($instvolunt as $g)

            ["{{$g->nombre }}",{{ $g->cantidad_voluntarios }}],  
           @endforeach
         
        ],  );

        var options = {
          title: 'Voluntarios por Institución',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }

       function panelout(objeto,font){
    var estado = $(font).html();
    switch(estado) {
    case '+':
     $(objeto).attr('style','display');
     $(font).html('-');
        break;
    case '-':
      $(objeto).attr('style','display:none');
     $(font).html('+');
        break;
    default:
        $(objeto).attr('style','display');
        $(font).html('-');
     }
   }
       </script>
    <script >

    @if(Session::has('message'))
        toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
    </script>
@endsection