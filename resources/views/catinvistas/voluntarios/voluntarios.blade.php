@extends('layouts.app')

@section('content')


<?php $kode=0 ?>
<script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js" charset="utf-8"></script>
<form action="{{ $ruta }}" method="POST" enctype="multipart/form-data">
@if ($metodo)
<input type="hidden" name="_method" value="PUT">
@endif
    <input id="token10" name="_token" type="hidden" value="{{ csrf_token() }}">
    <div class="alert alert-dismissible {{ $info['tipo_alerta'] }}" id="msj-form" role="alert" style="{{ $info['alertvisible'] }}">
        <button class="close" data-dismiss="alert" type="button">
            Ocultar×
        </button>
        <strong>
            {{ $info['alerta'] }}
        </strong>
    </div>
    <br/>
    <div align="center" class="container">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
           
            <button type="submit" name="guardar" id="guardar" class="btn btn-primary btn-lg btn-block" onclick="Colorvalidacion()">Guardar</button>
                <p align="right">
                    <a class="btn btn-default btn-lg btn-block" href="{{ route('index2') }}" type="button">
                        Ver todos los registros
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" >
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <label>
                            Datos Personales
                        </label>

                        <a type="button"  class="btn" title="Minimizar Panel" onclick="panelout('#divdatospersonales','#font1')"><font color="white" id="font1" >+</font></a>

                    </div>
                    <div class="panel-body"  id="divdatospersonales" style="display:none">
                        <table class="table">
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Estado:
                                        </span>

                                        <select class="form-control" id="estado" name="estado">

                                            <option value="activo" @if($datos['estado'] == 'activo') selected @endif  >
                                                Activo
                                            </option>
                                            <option value="inactivo" @if($datos['estado'] == 'inactivo') selected @endif >
                                                Inactivo
                                            </option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Código:
                                        </span>
                                        <input  onchange="existCodigo()" onkeypress="return validarnumeros(event)" class="form-control" id="codigo" minlength="1" maxlength="4" name="codigo" pattern="[0-9]+" placeholder="Codigo en numeros" required type="text" value="{{ $datos['codigo'] }}">
                                    </div>
                                    <div class="alert alert-warning" style="display:none" id="alert-codigo" >
                                         <strong>Advertencia!</strong> Ya existe este código favor utilizar otro!
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Concepto:
                                        </span>
                                        <select class="form-control" id="concepto" name="concepto" required="">
                                            <option value="1" @if($datos['concepto'] == '1') selected  @endif>
                                                Servicio Social
                                            </option>
                                            <option value="2" @if($datos['concepto'] == '2') selected  @endif>
                                                Voluntariado
                                            </option>
                                            <option value="3" @if($datos['concepto'] == '3') selected  @endif>
                                                Seminario
                                            </option>
                                            <option value="4" @if($datos['concepto'] == '4') selected  @endif>
                                                Beca al servicio
                                            </option>
                                            <option value="5" @if($datos['concepto'] == '5') selected  @endif>
                                                Beca de Idiomas
                                            </option>
                                            <option value="6" @if($datos['concepto'] == '6') selected  @endif>
                                                Eventual
                                            </option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Orientador/a:
                                        </span>
                                        <select class="form-control" id="id_orientador" name="id_orientador" required=""></select>
                                    </div>
                                    <p align="right">
                                        <a data-target="#addorientador" data-toggle="modal" href="">
                                            Agregar
                                        </a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Condicion:
                                        </span>
                                        <select class="form-control" id="condicion" name="condicion" required="">
                                            <option value="Aprobado" @if($datos['condicion'] == 'Aprobado' ) selected  @endif>
                                                Aprobado
                                            </option>
                                            <option value="Condicionado"@if($datos['condicion'] == 'Condicionado' ) selected  @endif>
                                                Bajo Condicion
                                            </option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group col-xs-4">
                                        <span class="input-group-addon">
                                            Fecha Inicio:
                                        </span>
                                        <input    class="form-control col-sm-2" id="fecha_inicio" name="fecha_inicio" placeholder="DD/MM/YYYY" required="" type="date" value="{{$datos['fecha_inicio']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group col-xs-3">
                                        <span class="input-group-addon">
                                            Fecha Finalizacion:
                                        </span>
                                        <input  class="form-control" id="fecha_fin" name="fecha_fin" placeholder="DD/MM/YYYY" required="" type="date" value="{{$datos['fecha_fin']}}">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading ">
                        <label>
                            Información Personal
                        </label>
                        <a type="button"  class="btn" title="Minimizar Panel" onclick="panelout('#divinfopersonal','#font2')"><font color="white" id="font2" >+</font></a>
                    </div>
                    <div class="panel-body" id="divinfopersonal" style="display:none">
                        <table class="table table-responsive">
                        <tr><td align="center">
                    <img id="imgSalida" name="imgSalida" src="{{ asset($datos['foto'])}}" align="center" style="width:100px">
                               <div class="input-group col-sm-5" align="right">
                                  <input type="file" id="foto" name="foto" class="form-control"  title="Seleccione Foto de Perfil"  >
                               </div>
                        </td>
                        </tr>
                            <tr>
                                <td>
                                    <div class="input-group">

                                        <span class="input-group-addon">
                                            Nombre:
                                        </span>
                                        <input onkeypress="return validarLetras(event)"  class="form-control" id="nombre" maxlength="40" name="nombre" pattern="[A-Z]{1-45}" required="true" style="text-transform:uppercase" type="text" value="{{$datos['nombre']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Dirección:
                                        </span>
                                        <textarea class="form-control" id="direccion" maxlength="250" name="direccion" required="">{{$datos['direccion']}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <div class="input-group">
                                      <span class="input-group-addon">
                                            Sexo:
                                        </span>
                                        <select class="form-control" id="sexo" name="sexo">
                                            <option value="m"  @if($datos['sexo'] == 'm' ) selected  @endif>Hombre</option>
                                            <option value="f" @if($datos['sexo'] == 'f' ) selected  @endif>Mujer</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Edad:
                                        </span>
                                        <div class="input-group col-xs-5">
                                        <input class="form-control" id="edad" max="45" min="18" name="edad" placeholder="DD/MM/YYYY" required="" step="1" type="range" value="{{$datos['edad']}}"/>
                                        <input class="form-control" id="edadsalida" name="edadsalida" readonly="true" required="" type="text" value="{{$datos['edad']}} años"/>
                                  </div>  
                              </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <div class="input-group">
                                <span class="input-group-addon">
                                Fecha de Nacimiento:
                                </span>
                                    <div class="input-group col-xs-5">
                                          <input class="form-control" id="f_nacimiento" type="date" name="f_nacimiento" placeholder="DD/MM/YYYY" required="" value="{{$datos['f_nacimiento']}}"/>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Correo Electrónico:
                                        </span>
                                        <input  class="form-control" id="correo" maxlength="30" name="correo" pattern="[A-Za-z][@][.]{1-30}" placeholder="ejemplo@dominio.net" required="true" type="email" value="{{$datos['correo']}}">
                                    </div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Telefono fijo:
                                        </span>
                                        <input onkeypress="return validarnumeros(event)"  class="form-control" id="telefono_f" maxlength="9" name="telefono_f" pattern="[0-9]{1-9}" placeholder="22223333" required="true" type="text" value="{{$datos['telefono_f']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            DUI:
                                        </span>
                                        <input  class="form-control" onkeypress="return validarnumeros(event)" id="dui" maxlength="9" minlength="9" name="dui" pattern="[0-9]{9}" placeholder="Ingrese sin guiones" required="true" type="text" value="{{$datos['dui']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            N° de Cuenta Bancaria:
                                        </span>
                                        <input  class="form-control" id="cuenta_bancaria" onkeypress="return validarnumeros(event)" maxlength="20" name="cuenta_bancaria" pattern="[0-9]{1-20}" placeholder="Solo numeros" required="true" type="text" value="{{$datos['cuenta_bancaria']}}">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading ">
                        <label>
                            Información Academica
                        </label>
                        <a type="button"  class="btn" title="Minimizar Panel" onclick="panelout('#divinfoacademic','#font3')"><font color="white" id="font3" >+</font></a>
                    </div>
                    <div class="panel-body" id="divinfoacademic" style="display:none">
                        <table class="table">
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Institución de Estudio:
                                        </span>
                                        <select class="form-control" id="id_institucion" name="id_institucion" required="true">
                                        </select>
                                    </div>
                                    <p align="right">
                                        <a data-target="#addinstitucion" data-toggle="modal" href="">
                                            Agregar
                                        </a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            N° carnet:
                                        </span>
                                        <input  class="form-control" id="carnet" maxlength="10" name="carnet" pattern="[A-Za-z0-9]{1-10}" required="true" style="text-transform:uppercase" type="text" value="{{$datos['carnet']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Carrera u opci&oacute;n Bachillerato:
                                        </span>
                                        <select class="form-control select" id="carrera_opcion" name="carrera_opcion" required="true"></select>
                                    </div>
                                    <p align="right">
                                        <a data-target="#addcarrera" data-toggle="modal" href="" id="linkaddcarrera">
                                            Agregar
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading ">
                        <label>
                            Información Interna
                        </label>
                          <a type="button"  class="btn" title="Minimizar Panel" onclick="panelout('#divinfointerna','#font4')"><font color="white" id="font4" >+</font></a>
                    </div>
                    <div class="panel-body" id="divinfointerna" style="display: none">
                        <table class="table">
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Horario:
                                        </span>
                                        <select class="form-control" id="horario" maxlength="20" name="horario"  ></select>                                          
                                       <!-- <input  class="form-control" id="horario" maxlength="20" name="horario" type="text" value="{{$datos['horario']}}"> -->
                                    </div>
                                    <p align="right">
                                        <a data-target="#addturno" data-toggle="modal" href="">
                                            Agregar
                                        </a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Horas requeridas:
                                        </span>
                                        <input  onkeypress="return validarnumeros(event)" class="form-control" id="horas_requeridas" maxlength="4" name="horas_requeridas" pattern="[0-9]{1-4}" required="true" type="text" value="{{$datos['horas_requeridas']}}">
                                        </input>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Horas realizar:
                                        </span>
                                        <input  onkeypress="return validarnumeros(event)" class="form-control" id="horas_realizar" maxlength="4" name="horas_realizar" pattern="[0-9]{1-9}" required="true" type="text" value="{{$datos['horas_realizar']}}">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Contacto de emergencia:
                                        </span>
                                        <input onkeypress="return validarLetras(event)" class="form-control" id="contacto" maxlength="30" name="contacto" pattern="[A-Za-z]{1-30}" style="text-transform:uppercase" type="text" value="{{$datos['contacto']}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Parentesco:
                                        </span>
                                        <select class="form-control" id="parentesco" name="parentesco">
                                            <optgroup label="Familiar">
                                                <option value="1" @if($datos['parentesco'] == '1' ) selected  @endif>
                                                    Pádre
                                                </option>
                                                <option value="2" @if($datos['parentesco'] == '2' ) selected  @endif>
                                                    Madre
                                                </option>
                                                <option value="3" @if($datos['parentesco'] == '3' ) selected  @endif>
                                                    Abuelo/a
                                                </option>
                                                <option value="4" @if($datos['parentesco'] == '4' ) selected  @endif>
                                                    Tío/a
                                                </option>
                                                <option value="5" @if($datos['parentesco'] == '5' ) selected  @endif>
                                                    Cónyuge
                                                </option>
                                            </optgroup>
                                            <optgroup label="Amistad">
                                                <option value="6" @if($datos['parentesco'] == '6' ) selected  @endif>
                                                    Amigo/a
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Teléfono:
                                            </span>
                                            <input onkeypress="return validarnumeros(event)" class="form-control" id="tel_contacto" maxlength="9" name="tel_contacto" pattern="[0-9]{1-9}" placeholder="22220000" type="text" value="{{$datos['tel_contacto']}}">
                                        </div>
                                    </td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Padecimiento Médico:
                                        </span>
                                        <input onkeypress="return validarLetras(event)"  class="form-control" id="padecimiento" maxlength="20" name="padecimiento" pattern="[A-Za-z]{1-20}" style="text-transform:uppercase" type="text" value="{{$datos['padecimiento']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Especifique:
                                        </span>
                                        <input onkeypress="return validarLetras(event)" class="form-control" id="descripcion" maxlength="20" name="descripcion" pattern="[A-Za-z]{1-20}" style="text-transform:uppercase" type="text" value="{{$datos['descripcion']}}">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div aria-hidden="true" aria-labelledby="addorientador" class="modal fade" id="addorientador" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('orientador.store') }}" enctype="multipart/form-data" method="post">
                <input id="token0" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="modal-header">
                    <h5 class="modal-title">
                        Agregar Orientador
                    </h5>
                </div>
                <div class="modal-body">
                    <label>
                        Nombre completo:
                    </label>
                    <div class="form-group " id="divorientador">
                        <input onkeypress="return validarLetras(event)" autofocus="true" class="form-control" id="modalorientador" maxlength="60" name="modalorientador" onclick="ocultarmsj()" required="true" style="text-transform:uppercase" type="text"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-success alert-dismissible" id="msj-orientador" role="alert" style="display:none">
                        <strong>
                            Agregado correctamente!
                        </strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible" id="msj-orientadorerror" role="alert" style="display:none">
                        <strong>
                                    No ha escrito nada!.
                        </strong>
                    </div>
                    <button class="btn btn-primary" id="guardaorientador" name="guardaorientador" type="button">
                        Guardar
                    </button>
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="ocultarmsj()" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="addcarrera" class="modal fade" id="addcarrera" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <input id="token1" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="modal-header">
                    <h5 class="modal-title">
                        Agregar carrera u Opcion de Bachillerato:
                    </h5>
                </div>
                <div class="modal-body">
                    <label>
                        Nombre de carrera u Opcion de bachillerato:
                    </label>
                    <div class="form-group " id="divcarrera">
                        <input onkeypress="return validarLetras(event)" autofocus="true" class="form-control " id="modalcarrera" maxlength="60" name="modalcarrera" onclick="ocultarmsj()" required="true" style="text-transform:uppercase" type="text"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-success alert-dismissible" id="msj-carrera" role="alert" style="display:none">
                        <strong>
                            Agregado correctamente!
                        </strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible" id="msj-carreraerror" role="alert" style="display:none">
                        <strong>
                       No ha escrito nada!.
                        </strong>
                    </div>
                    <button class="btn btn-primary" id="guardacarrera" name="guardacarrera" type="button">
                        Guardar
                    </button>
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="ocultarmsj()" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="addinstitucion" class="modal fade" id="addinstitucion" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <input id="token2" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="modal-header">
                    <h5 class="modal-title">
                        Agregar Instituci&oacute;n
                    </h5>
                </div>
                <div class="modal-body">
                    <label>
                        Nombre de la Instituci&oacute;n:
                    </label>
                    <div class="form-group " id="divinstituto">
                        <input onkeypress="return validarLetras(event)" autofocus="true" class="form-control " id="modalinstitucion" maxlength="60" name="modalinstitucion" onclick="ocultarmsj()" required="true" style="text-transform:uppercase" type="text"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-success alert-dismissible" id="msj-instituto" role="alert" style="display:none">
                        <strong>
                            Agregado correctamente!
                        </strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible" id="msj-instituloerror" role="alert" style="display:none">
                        <strong>
                          No ha escrito nada!.
                        </strong>
                    </div>
                    <button class="btn btn-primary" id="guardainstitucion" name="guardainstitucion" type="button">
                        Guardar
                    </button>
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="ocultarmsj()" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="addturno" class="modal fade" id="addturno" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <input id="token3" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="modal-header">
                    <h5 class="modal-title">
                        Agregar turnos
                    </h5>
                </div>
                <div class="modal-body">
                    <label>
                        Detalle del turno:
                    </label>
                    <div class="form-group " id="divturno">
                        <input  autofocus="true" class="form-control " id="modalturnos" maxlength="60" name="modalturnos" onclick="ocultarmsj()" required="true" style="text-transform:uppercase" type="text" >
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-success alert-dismissible" id="msj-turno" role="alert" style="display:none">
                        <strong>
                          Agregado correctamente!
                        </strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible" id="msj-turnoerror" role="alert" style="display:none">
                        <strong>
                          No ha escrito nada!.
                        </strong>
                    </div>
                    <button class="btn btn-primary" id="guardarturno" name="guardarturno" type="button">
                        Guardar
                    </button>
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="ocultarmsj()" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    //<!-- Seccion de JQUERY -->
$(document).ready(function() {
    $('#edad').on('change', function() {
        var valor = $(this).val();
        $('#edadsalida').val(valor + " años");
    });
    //para llenar el select de orientadores.
    $.ajax({
        type: 'GET',
        url: "{{route('orientador.index',20)}}",
        success: function(data) {
            $('select#id_orientador').html(data);
            $('select#id_orientador').val({{$datos['id_orientador']}});
        },error : function(xhr, status) {
             console.log("Llenado select orientadores [FALLO]");
           }
    });
    //llena el select de carreras o opcion de bachillerato.
    $.ajax({
        type: 'GET',
        url: "{{route('carrera.index')}}",
        success: function(data) {
            $('select#carrera_opcion').html(data);
            $('select#carrera_opcion').val({{$datos['carrera_opcion']}});

        },error : function(xhr, status) {
             console.log("Llenado select carreras [FALLO]");
           }
    });

   $.ajax({
        type: 'GET',
        url: "{{route('instituto.index')}}",
        success: function(data) {
            $('select#id_institucion').html(data);
            $('select#id_institucion').val({{$datos['id_institucion']}});
        },error : function(xhr, status) {
             console.log("Llenado select instituto [FALLO]");
           }
    });

   //Llenado del select turnos (horario)
    $.ajax({
        type: 'GET',
        url: "{{route('turnos.index')}}",
        success: function(data) {
              console.log("Llenado select turnos [OK]");
            $('select#horario').html(data);
            $('select#horario').val({{$datos['horario']}});

        },error : function(xhr, status) {
             console.log("Llenado select turnos [FALLO]");
           }
    });

$('#guardarturno').click(function(){
        var dato = $('#modalturnos').val();
        var route = "{{route('turnos.store')}}";
        var token = $('#token3').val();
        var letras = 0;

       for (var i = 0; i < dato.length; i++) {
            if (dato[i] != " ") {
              letras++;
            }
       }

        if (letras ==0) {
          $('#msj-turnoerror').fadeIn();
           $('#divturno').addClass('has-error');
        }else{
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            datatype: 'json',
            data: { horario: dato },
            success: function(resultado) {
                console.log("Registro ingresado [OK]");
                $('select#horario').html(resultado);
                $('#modalturnos').val('');
                $('#msj-turno').fadeIn();
            },
            error : function(xhr, status) {
             console.log("Llenado select turnos [FALLO]");
           }
        });}
    });


    // grabar el dato y actualiza el select
    $('#guardaorientador').click(function(){
        var dato = $('#modalorientador').val();
        var route = "{{route('orientador.store')}}";
        var token = $('#token0').val();
        var letras = 0;

       for (var i = 0; i < dato.length; i++) {
            if (dato[i] != " ") {
              letras++;
            }
       }

        if (letras ==0) {
          $('#msj-orientadorerror').fadeIn();
           $('#divorientador').addClass('has-error');
        }else{
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            datatype: 'json',
            data: { modalorientador: dato },
            success: function(resultado) {
                console.log("Registro ingresado [OK]");
                $('select#id_orientador').html(resultado);
                $('#modalorientador').val('');
                $('#msj-orientador').fadeIn();
            },error : function(xhr, status) {
             console.log("Llenado select orientador [FALLO]");
           }
        });}
    });

    $('#guardacarrera').click(function() {
        var dato = $('#modalcarrera').val();
        var route = "{{route('carrera.store')}}";
        var token = $('#token1').val();
        var letras = 0;

       for (var i = 0; i < dato.length; i++) {
            if (dato[i] != " ") {
              letras++;
            }
       }

       if (letras == 0) {
$('#msj-carreraerror').fadeIn();
 $('#divcarrera').addClass('has-error');
       }else{

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            datatype: 'json',
            data: {
                modalcarrera: dato
            },
            success: function(resultado) {
                console.log("Registro ingresado [OK]");
                $('select#carrera_opcion').html(resultado);
                $('#modalcarrera').val('');
                $('#msj-carrera').fadeIn();
            },
            error : function(xhr, status) {
             console.log("Llenado select carreras [FALLO]");
           }
        });}
    });


    $('#guardainstitucion').click(function() {
        var dato = $('#modalinstitucion').val();
        var route = "{{route('instituto.store')}}";
        var token = $('#token2').val();
        var letras = 0;
       for (var i = 0; i < dato.length; i++) {
            if (dato[i] != " ") {
              letras++;
            }
       }

       if (letras == 0) {
  $('#msj-instituloerror').fadeIn();
  $('#divinstituto').addClass('has-error');
       }else{

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            datatype: 'json',
            data: {
                modalinstitucion: dato
            },
            success: function(resultado) {
                console.log("Registro ingresado [OK]");
                $('select#id_institucion').html(resultado);
                $('#modalinstitucion').val('');
                $('#msj-instituto').fadeIn();
            },error : function(xhr, status) {
             console.log("Llenado select instituto [FALLO]");
           }
        });}
    });




}); //final de la funcion principal
</script>

<?php $codigo = null ?>
<script type="text/javascript">
    //funciones
function Colorvalidacion(){
          $('input:invalid , textarea:invalid').attr('style','border:0.50px solid red');
   $('input:valid , textarea:valid').attr('style','border solid #E6E6E6');
    
 
}
     function ocultarmsj(){
           //va quitar el mensaje
           $('#msj-orientadorerror').attr('style','display:none');
           $('#msj-orientador').attr('style','display:none');
           $('#msj-instituto').attr('style','display:none');
           $('#msj-instituloerror').attr('style','display:none');
           $('#msj-carrera').attr('style','display:none');
           $('#msj-carreraerror').attr('style','display:none');
           $('#msj-turnoerror').attr('style','display:none');
           $('#msj-turno').attr('style','display:none');
             $('#divorientador').removeClass('has-error');
              $('#divinstituto').removeClass('has-error');
               $('#divcarrera').removeClass('has-error');
               $('#divturno').removeClass('has-error');
   };

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


function validarnumeros(event){
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

function validarLetras(event){
    if((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32){
      return true;
     }
     return false;        
}

   function existCodigo(){
   //  var valor = $("input#codigo").val();
     var codigo =  $("input#codigo").val();
     var route  =  "{{route('valcodigo')}}";
     var token  =  $('#token1').val();
   // console.log("ruta: "+ route );
    console.log("codigo: " + codigo);

     $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            datatype: 'json',
            data: {
             code: codigo 
              },
            success: function(resultado) {
            console.log("respuesta del server: " + resultado);

            if (resultado) {
             console.log("Ya existe este codigo!");
             $("#codigo").val(null);
            $("#codigo").attr('style','border:0.50px solid red'); 
            $("div#alert-codigo").attr('style','display');
            }else{
                console.log("Codigo libre!"); 
                $("#codigo").attr('style','border solid #E6E6E6');
                   $("div#alert-codigo").attr('style','display:none');
            }
            }
        });
   }
</script>

<script type="text/javascript" language="javascript">
$(window).load(function(){

 $(function() {
  $('#foto').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
  });
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