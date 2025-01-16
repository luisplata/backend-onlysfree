@extends("plantilla.app")

@section("contenido")
<div class="col-md-12 col-sm-12 col-xs-12 text-right">
    <ul class="pagination pagination-split">
        <li><a href="{{url('admin/categoria/create')}}"><i class="fa fa-plus"></i> Crear</a></li>
    </ul>
</div>
@foreach($categorias as $categoria)
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
    <div class="well profile_view">
        <div class="col-sm-12">
            <div class="left col-xs-7">
                <h2>{{$categoria->nombre}}</h2>
                <ul class="list-unstyled">
                    <li><i class="fa fa-envelope"></i> {{$categoria->descripcion}}</li>
                    <li><i class="fa fa-phone"></i> {{$categoria->categoria->nombre}}</li>
                </ul>
            </div>
            <div class="right col-xs-5 text-center">
                <!--<img src="images/img.jpg" alt="" class="img-circle img-responsive">-->
            </div>
        </div>
        <div class="col-xs-12 bottom text-center">
            <div class="col-xs-12 col-sm-6 emphasis hidden">
                <p class="ratings">
                    <a>4.0</a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 emphasis">
                <a class="btn btn-primary" href="{{url("admin/categoria/$categoria->id")}}"><i class="fa fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="{{url("admin/categoria/$categoria->id/edit")}}"><i class="fa fa-edit"></i> Editar</a>
                {{Form::open(["url"=>"admin/categoria/$categoria->id","method"=>"DELETE"])}}
                <button type="submit" class="btn btn-primary"><i class="fa fa-ellipsis-h"></i> Eliminar</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection