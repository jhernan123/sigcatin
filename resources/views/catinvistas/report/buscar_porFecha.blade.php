@extends('layouts.app')
@section('content')



<div class="container">

     
    <div class="panel-body">
   
   
           

 <form method="get" action="{{route('reports')}}" enctype="multipart/form-data">

            <div class="form-group">
               
                Desde:<input type="date" name ="desde" required class="input-group-sm"> 
                Hasta:<input type="date" name ="hasta"  required class="input-group-sm">
                
                
                <button  type="submit" class="btn btn-default">Buscar</button>
            </div>
     </form>
    <hr>
  
 <div class="panel panel-primary active in"">
         <div class="panel-heading">
              Reporte de Horas por Rango entre Fechas
            </div>
        

         @if(count($servicio)>=1)
          <table id="example"   class="table table-hover" >
            <thead>
                <tr class="active">
                    <td>ID Voluntario</td>
                    <td>Nombre</td>
                     <td>Institucion</td>
                    <td>Fecha</td>
                    <td>Horas Registradas</td>
      
                </tr>
            </thead>
   
            <tfoot>
            <tr class="active">
                    <td>ID Voluntario</td>
                    <td>Nombre</td>
                     <td>Institucion</td>
                    <td>Fecha</td>
                    <td>Horas Registradas</td>
                </tr>
            </tfoot>


            <tbody>
                
                @foreach($servicio as $row)
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
    
</div>



     <script>



 $(document).ready(function() {



    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
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
 


   $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5','print'
        ],
         'scrollY': 200,
         'scrollX': true,
         'destroy':true
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