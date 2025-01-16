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
        </style>
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
                        <li class="nav-item active">
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
            <div class="row">
                <div class="col">
                    <h1 class="h1">
                        Quienes Somos
                    </h1>

                    <p>
                        <img src="http://192.168.33.10/images/portafolio-productos-wayuu.png" height="70" alt="" class="rounded float-right"> 
                        SOY CARIBBE UNA RAZA, es nuestro caballo de batalla, pues a través de
                        nuestra organización, queremos mandar un mensaje a todos nuestros
                        clientes y seguidores, donde entiendan que la pluralidad de culturas,
                        colores, estilos y sabores hacen de esta área de Colombia un punto
                        especial en la generación de arte y belleza.
                    </p>
                    <p>
                        <img src="http://192.168.33.10/images/portafolio-productos-wayuu.png" height="70" alt="" class="rounded float-right"> 
                        Rafa´s Tienda, quiere colaborar a través de un emprendimiento donde
                        podamos crear un punto de producción de artesanías, en un principio con
                        la cultura Wayuu y dar las herramientas y facilidades para iniciar dicho
                        emprendimiento conjuntamente. Somos una fundación, que quiere exaltar
                        las culturas Caribe y llevar estas a todas partes del planeta
                        convertidas en artesanías, música y sabores.
                    </p>
                    <p>
                        <img src="http://192.168.33.10/images/portafolio-productos-wayuu.png" height="70" alt="" class="rounded float-left"> 
                        Nuestro primer objetivo es construir una Maloca, en colaboración de la
                        comunidad y con el apoyo de indígenas de la cultura Tijuna del Amazonas,
                        para que todos en conjunto podamos terminarla y allí crear el primer
                        punto de confección y acopio de las artesanías, es una labor, un poco
                        complicada, pues debemos alinearnos todos, de manera que la suma de
                        valores y fortalezas de cada un de nosotros, pueda terminar en un
                        proyecto que de viabilidad a la construcción de nuestro primer
                        emprendimiento.
                    </p>
                    <p>
                        Estamos comprometidos y creemos en la filosofía de que toda persona
                        independientemente de su origen, raza, religión o creencia tiene el
                        derecho de intentar realizar sus sueños y poder tener un mejor bienestar
                        para ella misma y su gente. Y entendemos que si no se hace un proyecto
                        auto-sostenible, nunca estaremos haciendo un cambio, solo estaremos
                        dando soluciones puntuales y efímeras.
                    </p>
                    <p>
                        Si todos confiamos en los demás y colocamos nuestras aptitudes a favor
                        de los objetivos marcados, obtendremos algo que nos beneficie a cada uno
                        y a todos en general, de esta manera estamos repartiendo riqueza
                        (espiritual y material) y creando una mentalidad de trabajo en equipo
                        para resolver problemas y desarrollar nuestros objetivos y retos,
                        creando un mañana para las futuras generaciones, a través de un nuevo
                        presente.
                    </p>
                </div>
            </div>
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
    </body>
</html>