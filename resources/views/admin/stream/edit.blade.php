@extends("plantilla.app")

@section("contenido")
<form method="POST" action="/admin/stream/{{$stream->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input value="{{$stream->nombre}}" type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
        Estado <span class="required">*</span>
    </label>
    <div class="form-checks form-check-inline col-md-6 col-sm-6 col-xs-12">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="estado" id="inlineRadio1" value="1"  {{$stream->estado==1?'checked':''}}> Si
        </label>
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="estado"  id="inlineRadio2" value="0" {{$stream->estado==0?"checked":""}}> No
        </label>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagen">Imagen Source
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="imagen" name="imagen" value="{{$stream->imagen}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagen">Video Source
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="imagen" name="url" value="{{$stream->url}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de publicación<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="datetime-local" id="publication_date" name="publication_date" required="required" value='{{date("Y-m-d\TH:i:s",strtotime($stream->publication_date))}}' class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>


<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tags </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control col-md-7 col-xs-12" name="tags">{{$stream->tags}}</textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a class="btn btn-primary" href="{{url('/admin/stream')}}">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
</form>
@endsection
