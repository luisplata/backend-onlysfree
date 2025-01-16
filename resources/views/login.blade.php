<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Bootstrap -->
        <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">

        <style>
            .login_content form div a {
                font-size: inherit;
                margin: 0px;
            }
            .registration_form{
                position: absolute;
                left: -50%;
                width: 745px;
            }
        </style>
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        {{Form::open(["url"=>"/login","method"=>"POST"])}}
                        <h1>Ingreso</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Email" name="email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="pass" required="" />
                        </div>
                        <div>
                            <input type="submit" class="btn btn-default submit" value="Ingresar" />
                            <a class="btn btn-default submit" href="{{url('')}}">Regresar</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Creado por:
                                <a href="#signup" class="to_register"> Luis Plata </a>
                            </p>
                        </div>
                        {{Form::close()}}
                    </section>
                </div>

                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <div class="col-xs-12 text-center">
                            <a href="#signin" class="btn btn-default">Login</a>
                        </div>
                        <iframe src="https://luisplata.github.io" style="height: 387px;width: 745px;"></iframe>
                    </section>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
var url_string = window.location;
var url = new URL(url_string);
var mensaje = url.searchParams.get("mensaje");
var tipo = url.searchParams.get("tipo");
var titulo = url.searchParams.get("titulo");
if (mensaje != null) {
    swal(titulo == null ? "" : titulo, mensaje, tipo == null ? "info" : tipo);
}
        </script>
    </body>
</html>
