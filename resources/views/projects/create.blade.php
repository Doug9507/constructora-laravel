@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Obra</div>

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
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                             </button>
                        </div>
                    @endif

                    <form action="{{route('projects.store')}}" method="POST">
                      <div class="form-group">
                          <label for="nombre_proyecto">Titulo de Obra<span class="text-danger">*</span></label>
                          <input type="text" id="nombre_proyecto" class="form-control" name="nombre_proyecto" value="{{ old('nombre_proyecto') }}">
                      </div>
                      <div class="form-group row">
                          <div class="col-md-4">
                            <label for="inicio_obra">Inicio de la Obra<span class="text-danger">*</span></label>
                            <input type="date" id="inicio_obra" class="form-control" name="inicio_obra" value="{{ old('inicio_obra') }}">
                          </div>
                          <div class="col-md-4">
                            <label for="fin_obra">Fin de la Obra<span class="text-danger">*</span></label>
                            <input type="date" id="fin_obra" class="form-control" name="fin_obra" value="{{ old('fin_obra') }}">
                          </div>
                          <div class="col-md-4">
                            <label for="monto_contratado">Monto Contratado<span class="text-danger">*</span></label>
                            <input type="number" id="monto_contratado" class="form-control" name="monto_contratado" value="{{ old('monto_contratado') }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="entidad_solicitante">Entidad Solicitante<span class="text-danger">*</span></label>
                          <input type="text" id="entidad_solicitante" class="form-control" name="entidad_solicitante" value="{{ old('entidad_solicitante') }}">
                      </div>
                      <div class="form-group">
                          <label for="contratista">Contratista<span class="text-danger">*</span></label>
                          <input type="text" id="contratista" class="form-control" name="contratista" value="{{ old('contratista') }}">
                      </div>
                      <div class="form-group">
                          @csrf
                          <input type="submit" 
                          class="btn btn-block btn-primary" 
                          value="Crear">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection