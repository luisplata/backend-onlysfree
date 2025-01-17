@extends("plantilla.app")

@section("contenido")
<form method="POST" action="admin/producto/{{$producto->id}}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input value="{{$producto->nombre}}" type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
        Estado <span class="required">*</span>
    </label>
    <div class="form-checks form-check-inline col-md-6 col-sm-6 col-xs-12">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="estado" id="inlineRadio1" value="1"  {{$producto->estado==1?'checked':''}}> Si
        </label>
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="estado"  id="inlineRadio2" value="0" {{$producto->estado==0?"checked":""}}> No
        </label>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagen">Imagen Source
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="imagen" name="imagen" value="{{$producto->imagen}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Link <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="nombre-link" name="nombreLink" required="required" value="{{$producto->NombreLink}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hot Link <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="hot-link" name="hotLink" required="required" value="{{$producto->hotLink}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Padre </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" name="categoria_id">
            @foreach($categorias as $cate)
            @if($producto->categoria->id == $cate->id)
            <option selected="" value="{{$cate->id}}">{{$cate->nombre}}</option>
            @else
            <option value="{{$cate->id}}">{{$cate->nombre}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de publicación<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="datetime-local" id="publication_date" name="publication_date" required="required" value="{{date("Y-m-d\TH:i:s",strtotime($producto->publication_date))}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>


<div class="clearfix"></div>


<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tags </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control col-md-7 col-xs-12" name="tags">{{$producto->tags}}</textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Es Video<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="isVideo" id="isVideo" value="1" {{$producto->checkedSi}} >
            <label class="form-check-label" for="isVideo">
              Si
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="isVideo" id="isVideo2" value="0" {{$producto->checkedNo}}>
            <label class="form-check-label" for="isVideo2">
              No
            </label>
          </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Link del video
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="url" id="url_video" name="url_video" value="{{$producto->url_video}}" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a class="btn btn-primary" href="{{url('admin/producto')}}">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
</form>
@endsection
