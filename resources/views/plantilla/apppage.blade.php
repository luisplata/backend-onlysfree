<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <style>
            .contenido-medio{
                margin-bottom: 50px;
                margin-top: 50px;
            }
            .imagenes-portada img{
                width: 100%;
            }
            .articulo-principal-contenido{
                margin-bottom: 30px;
            }
            .card{
                margin-bottom: 2rem;
                margin-top: 2rem;
            }
        </style>
        @yield("plugin-css")
    </head>
    <body style="background-image: url('{{asset('images/fondo-1.jpg')}}');">
        <!-- Navbar parte superior de la pagina -->
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #c90000">
            <div class="container">
                <a class="navbar-brand" href="{{url("/")}}">
                    <img src="http://www.rafastienda.com/web/wp-content/uploads/2017/05/rafas-tienda-web-logo.jpg" height="70" alt=""> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse h5" id="navbarSupportedContent">
                    <ul class=" mr-auto"></ul>
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url("/")}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/quienes-somos")}}">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/portafolio")}}">Portafolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/faqs")}}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- / parte superior de la pagina -->

        <!-- Contenido Principal -->

        <div class="container">
            @yield("contenido")
        </div>

        <!-- Contenido Principal -->

		
        <!-- Footer -->

        <nav class="navbar navbar-dark sticky-button" style="background-color: #c90000; color: white;">
            <div class="container">
                <div class="col-md-4">
                    <p class="h4">Contactenos:</p>
                    <p>Aquiere todos tus productos wayu</p>
                    <p>
                        <span>Telefono:</span> <span>{{env("APP_TEL")}}</span>
                        <br/>
                        <span>Email:</span> <span>{{env("APP_MAIL")}}</span>
                        <br/>
                        <span>Dirección:</span> <span>{{env("APP_DIRECCION")}}</span>
                        <br/>
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center list-group">
                    <a class="badge" href="https://luisplata.github.io" target="_blank"><span>Creado Por: </span><span>Luis Enrique Plata Osorio</span></a>
                </div>
            </div>
        </nav>

        <!-- Footer -->


        <!-- Liks para el portafolio y la revista-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/i18next@9.0.0/i18next.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
$("#filtroPortafolio").on("change", function () {
    //swal(this.value);
    location.href = "{{url('/portafolio/')}}/" + this.value;
});
        </script>
        @yield("plugin-js")
    </body>
</html>