@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
              <div class="card-body text-center">
               <div>
               Proyecto : <strong>{{$project->nombre_proyecto}}</strong>
               <div>
               </div>
               Saldo Contable : <strong>{{$project->saldo_contable}}</strong>
               </div>
              </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">Lista de Registros de Entrada y Salida por Proyecto<a href="{{route('items.createItem',$project)}}" class="btn btn-sm btn-outline-success float-right">Crear E/S</a></div>

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
                        <th>ID</th>
                        <th class="text-center">Tipo de Operacion</th>
                        <th class="text-center">Fecha Registro</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio Unitario S/.</th>
                        <th class="text-center">Monto Total</th>
                        <th class="text-center">Tipo Recurso</th>
                        <th class="text-center">Proveedor</th>
                        <th class="text-center">Tipo Comprobante</th>
                        <th class="text-center">N° Comprobante</th>
                        <th colspan="2" class="text-center">Accion</th>
                      </thead>
                      <tbody>
                        @foreach($items as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td class="text-center">{{$item->tipo_operacion}}</td>
                          <td class="text-center">{{$item->fecha_registro}}</td>
                          <td class="text-center">{{$item->get_excerpt}}...</td>
                          <td class="text-center">{{$item->cantidad}}</td>
                          <td class="text-center">{{$item->precio_unitario}}</td>
                          <td class="text-center">{{$item->monto_total}}</td>
                          <td class="text-center">{{$item->tipo_recurso}}</td>
                          <td class="text-center">{{$item->proveedor}}</td>
                          <td class="text-center">{{$item->tipo_comprobante}}</td>
                          <td class="text-center">{{$item->numero_comprobante}}</td>
                          <td><a href="{{route('items.edit',$item)}}" class="btn btn-sm btn-primary">Editar</a>
                          <td><form id="myFormDetail" action="{{route('items.destroy',$item)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <input type="button" value="Eliminar"
                          class=" btn btn-sm btn-danger"
                          onclick="modal({{$item}})"
                          >
                          </form></td>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            {{$items->links()}}
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
        document.getElementById("myFormDetail").submit();
      } else {
        // swal("Your imaginary file is safe!");
      }
    });
}
</script>

@endsection