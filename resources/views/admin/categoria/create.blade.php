@extends("plantilla.app")

@section("contenido")
{{Form::open(["url"=>"admin/categoria","method"=>"POST"])}}

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="last-name" name="descripcion" required="required" class="form-control col-md-7 col-xs-12"></textarea>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Padre </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" name="padre">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
        </select>
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


{{Form::close()}}
@endsection