<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="{{url('/Images/iconos/casitaicono.png')}}" />

<!-- LINK JQUERY y SELECT2 -->
<link rel="stylesheet" type="text/css" href="{{url('/js/jquery/jquery-3.1.1.min.js')}}">
<link rel="stylesheet" type="text/css" href="{{url('/js/jquery/select2.min.js')}}">

  <script src="{{ asset('js/app.js') }}"></script>

 <!-- Styles -->
    <link href="{{ asset('css/footer-distributed.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="js/jquery/datatableJS/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="js/jquery/datatableJS/buttons.dataTables.min.css">



<script type="text/javascript" src="{{url('js/jquery/datatableJS/jquery.dataTables.min.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/dataTables.buttons.min.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/buttons.flash.min.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/jszip.min.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/pdfmake.min.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/vfs_fonts.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/buttons.html5.min.js')}} "></script>
<script type="text/javascript" src="{{url('js/jquery/datatableJS/buttons.print.min.js')}} "></script>



<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="{{url('js/jquery/toastr.css')}} ">
<script src="{{url('js/jquery/toastr.min.js')}}   "></script>

<!-- Charts -->
<script type="text/javascript" src="{{url('js/jquery/loader.js')}} "></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CATIN</title>

   

   
</head>
<body>


    <div id="app">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar">fdsg</span>
                        <span class="icon-bar">sfgsdg</span>
                        <span class="icon-bar">sgsgsg</span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       <span class="icon icon-home"></span>
                       CATIN
                    </a>

<!-- COMIENZA MENU-->

                     <ul class="nav navbar-nav navbar-collapse">
@if (Auth::user()->type == ('admin') )

                        <li class="dl-horizontal" ><a href="{{ route('voluntarios.index')}}"><span class="icon icon-pencil"></span>Registrar Expediente</a></li>

                        <li class="dl-horizontal"><a href="{{route('importar.index')}}"><span class="icon icon-calendar"></span>Ingresar Marcaciones</a></li>
                        
                        <li class="dropdown"><a href="{{route('report.index')}}"><span class="icon icon-search"></span>Buscar</a></li>

                        <li class="dl-horizontal">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="icon icon-printer"></span>Reportes
                        <b class="caret"></b></a>

                        <ul class="dropdown-menu">
                         <li class="dl-horizontal"><a href="{{route('concepto.index')}}"><span class="icon icon-checkmark">
        
                        </span>Por Categoria</a></li>
                         <li class="dl-horizontal"><a href="{{route('reports')}}">
                         <span class="icon icon-calendar"></span>Por Rango de Fecha</a>
                             </li>
                        <li class="dl-horizontal"><a href="{{route('reportH')}}">
                         <span class="icon icon-stack"></span>Horas Requeridas/Realizadas</a>
                      </li>

                      <li class="dl-horizontal"><a href="{{route('reportsexo')}}">
                         <span class="icon icon-user"></span>Consulta Voluntarios por Genero</a>
                      </li>

                        </ul>  </li>
@else
 <li class="dropdown"><a href="{{route('report.index')}}"><span class="icon icon-search"></span>Buscar</a></li>

                        <li class="dl-horizontal">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="icon icon-printer"></span>Reportes
                        <b class="caret"></b></a>

                        <ul class="dropdown-menu">
                         <li class="dl-horizontal"><a href="{{route('concepto.index')}}"><span class="icon icon-checkmark">
        
                        </span>Por Categoria</a></li>
                         <li class="dl-horizontal"><a href="{{route('reports')}}">
                         <span class="icon icon-calendar"></span>Por Rango de Fecha</a>
                             </li>
                        <li class="dl-horizontal"><a href="{{route('reportH')}}">
                         <span class="icon icon-stack"></span>Horas Requeridas/Realizadas</a>
                      </li>

                        </ul>  </li>
@endif




                    </ul>

                    <!-- TERMINA MENU-->

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
  

</body>
</html>
 
