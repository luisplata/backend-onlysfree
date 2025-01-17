@extends("plantilla.app")

@section("contenido")
<form method="POST" action="/admin/producto">
    @csrf
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Imagen Source
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="last-name" name="url" value="#" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group hidden">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control col-md-7 col-xs-12" name="descripcion"></textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group hidden">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control col-md-7 col-xs-12" name="descripcion"></textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Categoria </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" name="categoria_id">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
        </select>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tags </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control col-md-7 col-xs-12" name="tags"></textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Link <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="nombre-link" name="nombreLink" required="required" value="#" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hot Link <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="url" id="hot-link" name="hotLink" required="required" value="#" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de publicación<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="datetime-local" id="publication_date" name="publication_date" required="required" value="" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Es Video<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="isVideo" id="isVideo" value="1">
            <label class="form-check-label" for="isVideo">
              Si
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="isVideo" id="isVideo2" value="0" checked>
            <label class="form-check-label" for="isVideo2">
              No
            </label>
          </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Link del video<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="url" id="url_video" name="url_video" required="required" value="#" class="form-control col-md-7 col-xs-12">
    </div>
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="reset" class="btn btn-primary">Cancel</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>
@endsection
