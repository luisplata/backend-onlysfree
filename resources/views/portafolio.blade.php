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
            .card-img-top {
                height: 600px;
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/quienes-somos")}}">Quienes Somos</a>
                        </li>
                        <li class="nav-item active">
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

                {{-- <div class="col-12">
                    <img src="http://via.placeholder.com/1400x200?text=Todo viene con el Kit Caribean" style="width: 100%;margin-top: 1em;">
                </div> --}}
                <div class="col-12">
                    <img class="d-block w-100" src="{{asset('images/banner/bannerprueba3.png')}}" alt="First slide">

            

                </div>
                <div class="col-12">
                    <br/>
                    <h1 class="h1 text-center">
                        Categorías
                    </h1>
                    <div class="row" >
                        <div class="col-md-4"><br/></div>
                        <div class="col-md-4">
                            <p>
                                <select class="form-control" id="filtroPortafolio" name="filtro">
                                    <option value="" selected>Productos</option>
                                    {{$c = NULL}}
                                    @foreach($categorias as $categoria)
                                    @if($categoria->id == $filtro)
                                    {{$c = $categoria}}
                                    <option selected value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @else
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </p>
                        </div>

                        </div>
                        <br>
                        @if(is_object($c))
                        <div class="row">
                            <div class="col-12">


                                <div class="card-body bg-white text-center">
                                    {{$c->descripcion}}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{$producto->imagen}}" alt="Card image cap">
                        <div class="card-body text-center">
                            {{-- <h4 class="card-title">{{$producto->nombre}}</h4> --}}
                            <a href="{{$producto->url}}" class="btn btn-primary" target="_blank">Comprar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="">
                <nav aria-label="Page navigation example ">
                    {{ $productos->links()  }}
                </nav>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
$("#filtroPortafolio").on("change", function () {
    //swal(this.value);
    location.href = "{{url('/portafolio/')}}/" + this.value;
});
$(document).ready(function () {
    var ul = $(".pagination");
    ul.addClass("justify-content-center");
    $.each(ul.children("li"), function (key, value) {
        console.log(value);
        value.classList.add("page-item");
        console.log($(value).children());
        var hijo = $(value).children();
        console.log(hijo);
        hijo.addClass("page-link");
    });
});
        </script>
    </body>
</html>