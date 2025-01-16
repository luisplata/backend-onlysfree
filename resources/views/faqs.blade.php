@extends("plantilla.apppage")

@section("plugin-css")
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
@endsection

@section("contenido")


<div class="row">

<div class="col-md-6">

{{-- <div id="accordion" role="tablist" class="col-md-6" style="height: 50%; width: 50%; text-align: center;">
   --}}  
    <br>
    
    {!! Form::open(['method'=> 'POST'])!!}

          <div class="form-group">
                <label for="ejemplo_name_1">NOMBRES</label>
                <input type="text" class="form-control" id="ejemplo_email_1"
                       placeholder="Nombres y Apellidos" name="nombre">
          </div>
          <div class="form-group">
                <label for="ejemplo_email_1">EMAIL</label>
                <input type="email" class="form-control" id="ejemplo_email_1"
                       placeholder="Introduce tu email" name="mail">
          </div>

          <div class="form-group">
                <label for="ejemplo_city_1">CIUDAD</label>
                <input type="text" class="form-control" id="ejemplo_email_1"
                       placeholder="Introduce tu email" name="ciudad">
          </div>

          <div class="form-group">
                <label for="ejemplo_tel_1">TELEFONO</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefono">
          </div>
          
          <div class="form-group">
                <label for="ejemplo_email_1">MENSAJE</label>
                <textarea class="form-control" rows="3" name="descripcion"></textarea>
          </div>
          
            <button type="submit" class="btn btn-danger">Enviar</button>
    {!! Form::close()!!}
  
    <br><br>

    
{{-- </div> --}}

</div>

<div class="col-md-6" >
    <br>
        <h2>¿ Tienes alguna duda o sugerencia?</h2>
        <p>Sientete en libertad de escribirnos. Estaremos muy agradecidos y dispuestos para colaborarte en la brevedad del tiempo.</p> 
    </div>    

</div>    

@endsection

@section("plugin-js")
@endsection