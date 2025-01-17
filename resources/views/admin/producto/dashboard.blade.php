@extends("plantilla.app")

@section("contenido")
<div class="col-md-12 col-sm-12 col-xs-12 text-right">
    <a class="btn btn-primary" href="{{url('/admin/producto/create')}}"><i class="fa fa-plus"></i> Crear single post</a>
    <a class="btn btn-primary" href="{{url('/admin/producto/upload')}}"><i class="fa fa-cloud"></i> Upload CSV File</a>
</div>

<table class="table table-striped table-hover" id="tableData">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Es publicado?</th>
        <th scope="col">Fecha de publicacion</th>
        <th scope="col">Visitas</th>
        <th scope="col">Clicks</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <th>{{$producto->nombre}}</th>
                <td>{{strtotime($producto->publication_date) <= strtotime(date("Y-m-d H:i:s"))?"Si":"No"}}</td>
                <td>{{$producto->publication_date}}</td>
                @if($producto->Visitas == null)
                    <td>0</td>
                    <td>0</td>
                @else
                    <td>{{$producto->Visitas->visita}}</td>
                    <td>{{$producto->Visitas->idoAlPack}}</td>
                @endif
                <td><a class="btn btn-primary" href="{{url("/admin/producto/$producto->id/edit")}}"><i class="fa fa-edit"></i> Editar</a></td>
                <td>
                    <form method="POST" action="/admin/producto/{{$producto->id}}">
                        @csrf
                        @method("DELETE")
                    <button type="submit" class="btn btn-primary"><i class="fa fa-ellipsis-h"></i> Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<br><script src = "//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script>
    $(document).ready( function () {
        $('#tableData').DataTable({
        "order": [[ 2, "desc" ]]
    });
    } );
</script>
@endsection
