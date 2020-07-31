@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Obra</div>

                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            - {{ $error }} <br>
                            @endforeach
                    </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                             </button>
                        </div>
                    @endif

                    <form action="{{route('projects.update',$project)}}" method="POST">
                    @method('PUT')
                      <div class="form-group">
                          <label for="nombre_proyecto">Titulo de Obra<span class="text-danger">*</span></label>
                          <input type="text" id="nombre_proyecto" class="form-control" name="nombre_proyecto" value="{{ old('nombre_proyecto',$project->nombre_proyecto) }}">
                      </div>
                      <div class="form-group row">
                          <div class="col-md-4">
                            <label for="inicio_obra">Inicio de la Obra<span class="text-danger">*</span></label>
                            <input type="date" id="inicio_obra" class="form-control" name="inicio_obra" value="{{ old('inicio_obra',$project->inicio_obra) }}">
                          </div>
                          <div class="col-md-4">
                            <label for="fin_obra">Fin de la Obra<span class="text-danger">*</span></label>
                            <input type="date" id="fin_obra" class="form-control" name="fin_obra" value="{{ old('fin_obra',$project->fin_obra) }}">
                          </div>
                          <div class="col-md-4">
                            <label for="monto_contratado">Monto Contratado<span class="text-danger">*</span></label>
                            <input type="number" id="monto_contratado" class="form-control" name="monto_contratado" value="{{ old('monto_contratado',$project->monto_contratado) }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="entidad_solicitante">Entidad Solicitante<span class="text-danger">*</span></label>
                          <input type="text" id="entidad_solicitante" class="form-control" name="entidad_solicitante" value="{{ old('entidad_solicitante',$project->entidad_solicitante) }}">
                      </div>
                      <div class="form-group">
                          <label for="contratista">Contratista<span class="text-danger">*</span></label>
                          <input type="text" id="contratista" class="form-control" name="contratista" value="{{ old('contratista',$project->contratista) }}">
                      </div>
                      <div class="form-group">
                          <input type="hidden" id="saldo_contable" class="form-control" name="saldo_contable" value="{{ old('saldo_contable',$project->saldo_contable) }}">
                      </div>
                      <div class="form-group">
                          @csrf
                          <input type="submit" 
                          class="btn btn-block btn-primary" 
                          value="Guardar Cambios">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection