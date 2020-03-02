  @extends('layouts.app')




@section('content')



<div class="container">

    <div class="panel-body">


    <hr>
   <div class="panel panel-primary active in" >
         <div class="panel-heading">
               Reporte General de Horas Requeridas / Registradas
            </div>

        @if(count($horas)>=1)


        <table id="example"   class="table table-hover" >
            <thead>
                <tr class="active">
                    <th>ID</th>
                    <th>Nombre</th>
                     <th>Institucion</th>
                    <th>Fecha</th>
                    <th>Horas Requeridas</th>
                     <th>Horas Realizará</th>
                    <th>Horas Registradas</th>
                    </tr>


            </thead>

<tfoot>
  <tr class="active">
                    <th>ID</th>
                    <th>Nombre</th>
                     <th>Institucion</th>
                    <th>Fecha</th>
                    <th>Horas Requeridas</th>
                     <th>Horas Realizará</th>
                    <th>Horas Registradas</th>
                    </tr>
</tfoot>




            <tbody>

                @foreach($horas as $row)

                    @if($row->total >= $row->horas_realizar )
                    <tr bgcolor='#BCF5A9'>
                  <td>{{$row->codigo}}</td>
                    <td>{{$row->n}}</td>
                    <td>{{$row->nombre}}</td>
                    <td>{{substr($row->fecha,0,11)}}</td>
                    <td><center>{{$row->horas_requeridas}}</td>
                    <td><center>{{$row->horas_realizar}}</td>
                    <td><center>{{$row->total}}</td>


                </tr>
                    @else
                    <tr>
                  <td>{{$row->codigo}}</td>
                    <td>{{$row->n}}</td>
                    <td>{{$row->nombre}}</td>
                    <td>{{substr($row->fecha,0,11)}}</td>
                    <td><center>{{$row->horas_requeridas}}</td>
                    <td><center>{{$row->horas_realizar}}</td>
                    <td><center>{{$row->total}}</td>


                </tr>
                    @endif


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

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar" />' );
    } );

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [

            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            
            'print',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape'    
             }  
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
