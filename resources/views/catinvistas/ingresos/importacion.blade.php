@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">IMPORTACION DE REGISTROS</div>

                <div class="panel-body">
                
                   <label><h4>Proceso para realizar la importación de datos</h4> </label>
            <br>
            <div class="alert alert-info">
                Seleccionar el archivo .csv <i>Delimitado por comas</i>
                verifique estar seguro/a que no ha hecho este proceso antes
                con los mismos datos.<br>
                RECUERDE: Para la correcta realización de este procedimiento, antes de la importación deben estar registrados  todos los voluntarios con su respectivo código.
            </div>
            <h3>Formato de los campos del archivo(Ejemplo):</h3>
            <div>
                <table class="table-bordered" align="center">
                    
                    <tr><td align="center">  id_voluntario  </td><td align="center">  marcacion  </td></tr>
                    <tr><td>  314  </td><td>  14/02/2017  01:17:00 p.m. </td></tr>
                </table>
            </div>
<!--          <h4><a href="{{route('mensaje')}}" class="badge">IMPORTAR REGITROS</a></h4>-->
       </div>   
  <form method="post" action="{{route('storage')}}" enctype="multipart/form-data">
        
   <input type="hidden" name="_token" value="{{ csrf_token() }}">    

   <div class="form-group">
       <br>   
             <label for="Archivo">Localice y seleccione el archivo</label>               
             <input type="file" name="file"  class="form-control" placeholder="file">
                         
               <button type="submit" class="btn-default">Registrar</button>
        </div>
    </form>       

            @if(isset($data))
            <center><div class="alert alert-success">
                Se realizó satisfactoriamente el registro de datos!.
                </div></center>
            @else
            <center><div class="alert alert-warning">
                Aún no realiza proceso de carga de registro de datos.
                </div></center>
            @endif 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
