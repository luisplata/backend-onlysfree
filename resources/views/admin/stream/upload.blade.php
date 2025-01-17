@extends("plantilla.app")

@section("contenido")
<form action="{{ route('admin.stream.uploadFile') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Archivo CSV:
    <br />
    <input type="file" name="logo" />


    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a class="btn btn-primary" href="{{url('/admin/stream')}}">Cancel</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection
