@extends("plantilla.app")

@section("contenido")
{{Form::open(["url"=>["admin/categoria", $categoria->id],"method"=>"PUT"])}}

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input value="{{$categoria->nombre}}" type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="last-name" name="descripcion" required="required" class="form-control col-md-7 col-xs-12">{{$categoria->descripcion}}</textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Padre </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" name="padre">
            @foreach($categorias as $cate)
            @if($categoria->categoria->id == $cate->id)
            <option selected="" value="{{$cate->id}}">{{$cate->nombre}}</option>
            @elseif($categoria->id == $cate->id)
            <!--No se muestra la opcion de si mismo-->
            @else
            <option value="{{$cate->id}}">{{$cate->nombre}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>
<div class="clearfix"></div>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a class="btn btn-primary" href="{{url('categoria')}}">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>


{{Form::close()}}
@endsection