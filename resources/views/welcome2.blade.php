<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link href="{{ asset('css/footer-distributed.css') }}" rel="stylesheet">
<link href="{{ asset('css/demo.css') }}" rel="stylesheet">
        <!-- Styles -->
                <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }

            .carousel-inner img {
                width: 100%; /* Set width to 100% */
                margin: auto;
                min-height:200px;
            }

            /* Hide the carousel text when the screen is less than 600 pixels wide */
            @media (max-width: 600px) {
                .carousel-caption {
                    display: none; 
                }
            }
        </style>
    </head>
    <body>
        
                <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"> C A T I N </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
           
                   
                    <ul class="nav navbar-nav navbar-right">
                                 @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <a href="{{ url('/register') }}">.</a>
                    @endif
                </div>
            @endif
                       
                    </ul>
                </div>
            </div>
        </nav>
        
        
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset('slides/banner1.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <h3>Entrada Principal</h3>
                        <p>Instalaciones</p>
                    </div>      
                </div>

                <div class="item">
                    <img src="{{asset('slides/banner2.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <h3>Artes Escenicas</h3>
                        <p>Teatro En El Salvador</p>
                    </div>      
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        
        
        <div class="container text-center">    
            <h3>Sistema Para el Control de Asistencia de Voluntariado</h3><br>
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{asset('Images/1.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
                    <p>Voluntariado</p>
                </div>
                <div class="col-sm-4"> 
                    <img src="{{asset('Images/2.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
                    <p>Horas Sociales</p>    
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p>Universidad Salvadoreña Alberto Masferrer </p><br>USAM
                    </div>
                    <div class="well">
                        <p>Proyecto de Horas Sociales, Licenciatura en Ciencias de la Computación. Facultad de Ciencias Empresariales</p>
                    </div>
                </div>
            </div>
        </div><br>
          
       
        
        
        <footer class="container-fluid text-center">
            <div class="footer-left">
				<p class="footer-links">
					Desarrolladores:	
					<span class="icon icon-laptop">Ingrid Contreras</span>
					·
					<span class="icon icon-user">Adonay Hernandez</span>
				</p>
				<p>Servicio Social USAM &copy; 2017</p>
			</div>
        </footer>
    </body>
</html>
