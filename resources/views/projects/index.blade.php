@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <a href="{{route('projects.exportarPdf')}}" target="_blank" class="btn btn-sm btn-primary mb-2">Reporte de Obras</a>
            <div class="card mb-2">
                <div class="card-header">Lista de Obras <a href="{{route('projects.create')}}" class="btn btn-sm btn-outline-success float-right">Crear Obra</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-hover table-responsive">
                      <thead class="table-info">
                        <th class="text-center col-md-1">ID</th>
                        <th class="text-center col-md-2">Titulo de Obra</th>
                        <th class="text-center col-md-1">Saldo Contable</th>
                        <th class="text-center col-md-2">Entidad</th>
                        <th class="text-center col-md-2">Contratista</th>
                        <th class="text-center col-md-1">Monto Contratado</th>
                        <th class="text-center col-md-1">Inicio de Obra</th>
                        <th class="text-center col-md-1">Termino de Obra</th>
                        <th class="text-center col-md-1">Accion</th>
                      </thead>
                      <tbody>
                        @foreach($projects as $project)
                        <tr>
                          <td class="text-center">{{$project->id}}</td>
                          <td class="text-center">{{$project->nombre_proyecto}}</td>
                          <td class="text-center">{{$project->saldo_contable}}</td>
                          <td class="text-center">{{$project->entidad_solicitante}}</td>
                          <td class="text-center">{{$project->contratista}}</td>
                          <td class="text-center">{{$project->monto_contratado}}</td>
                          <td class="text-center">{{$project->inicio_obra}}</td>
                          <td class="text-center">{{$project->fin_obra}}</td>
                          <td>
                          <div class="btn-group">
                            <a href="{{route('items.indexId',$project)}}" class="btn btn-sm btn-warning">E/S</a>
                            <a href="{{route('projects.edit',$project)}}" class="btn btn-sm btn-primary">Editar</a>
                            <form id="myForm" action="{{route('projects.destroy',$project)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="button" value="Eliminar"
                                class=" btn btn-sm btn-danger"
                                onclick="modal({{$project}})"
                                >
                            </form>
                          </div>
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            {{$projects->links()}}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function modal(project){
      swal({
      title: "¿Estas seguro?",
      text: "Una vez eliminado, no seras capaz de recuperar el archivo!",
      icon: "warning",
      buttons: ["Cancelar", "Confirmar"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        // axios.delete(`/projects/${project.id}`)
        // .then( () => {
        // window.location.reload();
        // });

        document.getElementById("myForm").submit();

      } else {
        // swal("Your imaginary file is safe!");
      }
    });
}
</script>

@endsection