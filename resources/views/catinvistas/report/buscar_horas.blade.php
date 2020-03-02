@extends('layouts.app')
 @section('content')

<div class="container">
 
    <div class="panel-body">
   
   
            
       
           <form method="get" action="{{route('report.index')}}" enctype="multipart/form-data">

            <div class="form-group">
                <input type="text" name= "id_voluntario" class="form-control" placeholder="Buscar por Código ">
                </div>
                <button  type="submit" class="btn btn-default">Buscar</button>
            
     </form>






    <hr>
   <div class="panel panel-primary active in" >
         <div class="panel-heading">
               Reporte General de Horas Contabilizadas
            </div>
        
        @if(count($horas)>=1)
        <table id="example"   class="table table-hover" >
            <thead>
                <tr class="active">
                    <th>ID Voluntario</th>
                    <th>Nombre</th>
                     <th>Institucion</th>
                    <th>Fecha</th>
                    <th>Horas Registradas</th>
                    </tr>


            </thead>

<tfoot>
  <tr class="active">
                    <th>ID Voluntario</th>
                    <th>Nombre</th>
                     <th>Institucion</th>
                    <th>Fecha</th>
                    <th>Horas Registradas</th>
                    </tr>
</tfoot>




            <tbody>
                
                @foreach($horas as $row)
                <tr>
                  <td>{{$row->id_voluntario}}</td>
                    <td>{{$row->n}}</td>
                    <td>{{$row->nombre}}</td>
                    <td>{{substr($row->fecha,0,11)}}</td>
                     <td>{{$row->horas}}</td>
             
                       
                    
                </tr>
            
                   @endforeach 
              </tbody>  
        </table>
        
        @else
         <div class='alert alert-warning'>
        <strong>Ooops!</strong> No hay registros que mostrar.
    </div>
        @endif
        
        
        
   </div>
    </div>
    <div>{{ $horas->appends(Request::except('page'))->links() }} </div>
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

$("#example_paginate").attr('style','display:none');

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



