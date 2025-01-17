@extends("plantilla.app")

@section("contenido")
<div class="col-md-12 col-sm-12 col-xs-12 text-right">
    <a class="btn btn-primary" href="{{url('/admin/stream/create')}}"><i class="fa fa-plus"></i> Crear single post</a>
    <a class="btn btn-primary" href="{{url('/admin/stream/upload')}}"><i class="fa fa-cloud"></i> Upload CSV File</a>
</div>

<table class="table table-striped table-hover" id="tableData">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Es publicado?</th>
        <th scope="col">Fecha de publicacion</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
        @foreach($streams as $stream)
            <tr>
                <th>{{$stream->nombre}}</th>
                <td>{{strtotime($stream->publication_date) <= strtotime(date("Y-m-d H:i:s"))?"Si":"No"}}</td>
                <td>{{$stream->publication_date}}</td>
                <td><a class="btn btn-primary" href='{{url("/admin/stream/$stream->id/edit")}}'><i class="fa fa-edit"></i> Editar</a></td>
                <td>
                    <form method="POST" action="/admin/stream/{{$stream->id}}">
                        @csrf
                        @method('DELETE')
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
