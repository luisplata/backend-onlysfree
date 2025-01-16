@extends("plantilla.app")

@section("contenido")
{{Form::open(["url"=>"admin","method"=>"POST"])}}

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="email" id="last-name" name="email" required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="tel" name="telefono">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="birthday" name="pass1" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password">
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirme Contraseña <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="birthday" name="pass2" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password">
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