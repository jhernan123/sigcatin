  @extends('layouts.app')




@section('content')



<div class="container">

    <div class="panel-body">


    <hr>
   <div class="panel panel-primary active in" >
         <div class="panel-heading">
              Reporte Detalle por Concepto:  
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
            <tbody>

                @foreach($datos as $row)

                <tr>
                <td>{{$row->id_voluntario}}</td>
                    <td>{{$row->n}}</td>
                    <td>{{$row->nombre}}</td>     





                </tr>
            </tbody>
                   @endforeach

        </table>


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
  </script>
    @endsection
