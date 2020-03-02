  @extends('layouts.app')
  @section('content')


<div class="container">

    <div class="panel-body">

    <hr>
   <div class="panel panel-primary active in" >
         <div class="panel-heading">
              Reporte Detalle por Concepto:  <h4><b><u>{{$c}}</u></b></h4>
            </div> 


      @if($datos)
        <table id="example"   class="table table-hover" >
            <thead>
                <tr class="active">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Institución</th>                
                </tr>
            </thead>
            <tfoot>
                    <tr class="active">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Institución</th>
                    </tr>
            </tfoot>
             <!--<?php $countt=0; ?>-->
            <tbody> 
               
                @foreach($datos as $row)
               <!-- <?php  $countt=$countt+1; ?>-->
                <tr>
                    <td>{{$row->id_voluntario}}</td>
                    <td>{{$row->n}}</td>
                    <td>{{$row->nombre}}</td>         
                </tr>
                 
                @endforeach 
                </tbody> 
               <!-- <tr><td>Total datos: <?php  echo $countt; ?>   </td></tr>-->

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
            'pdfHtml5','print'
        ]
    } );

$("#example_filter").attr('style','display:none');

} );

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
@endsection




