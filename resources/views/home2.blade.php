@extends('layouts.appRep')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SISTEMA PARA EL CONTROL DE LAS ASISTENCIAS DE VOLUNTARIADOS EN TIN MARIN</div>
                   
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenid@! USUARIO ROL: REPORTES
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
