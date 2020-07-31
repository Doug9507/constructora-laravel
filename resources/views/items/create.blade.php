@extends('layouts.app')

@section('content')
<div id="app-items" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            <div class="card">
                <div class="card-header">Crear E/S</div>

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

                    <form action="{{route('items.store')}}" method="POST">
                    <div class="form-group row">
                          <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}">
                          <div class="col-md-4">
                            <label for="tipo_operacion">Tipo de Operacion<span class="text-danger">*</span></label>
                            <select class="form-control" id="tipo_operacion" name="tipo_operacion">
                              <option value="NO ESPECIFICA">SELECCIONE</option>
                              <option value="INGRESO">INGRESO</option>
                              <option value="EGRESO">EGRESO</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label for="fecha_registro">Fecha Registro<span class="text-danger">*</span></label>
                            <input type="date" id="fecha_registro" class="form-control" name="fecha_registro" value="{{ old('fecha_registro') }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="descripcion">Descripcion</label>
                          <textarea name="descripcion" id="descripcion" rows="2" class="form-control"></textarea>
                      </div>
                      <calculo></calculo>
                      <div class="form-group row">
                          <div class="col-md-4">
                            <label for="tipo_recurso">Tipo de Recurso<span class="text-danger">*</span></label>
                            <select class="form-control" id="tipo_recurso" name="tipo_recurso">
                              <option value="NO ESPECIFICA">SELECCIONE</option>
                              <option value="MATERIAL">MATERIAL</option>
                              <option value="MANO DE OBRA">MANO DE OBRA</option>
                              <option value="EQUIPOS Y/O HERR.">EQUIPOS Y/O HERR.</option>
                              <option value="SUB-CONTRATOS">SUB-CONTRATOS</option>
                              <option value="GASTOS GENERALES">GASTOS GENERALES</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                          <label for="proveedor">Proveedor<span class="text-danger">*</span></label>
                            <input type="text" id="proveedor" class="form-control" name="proveedor" value="{{ old('proveedor') }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-4">
                            <label for="tipo_comprobante">Tipo de Comprobante<span class="text-danger">*</span></label>
                            <select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
                              <option value="NO ESPECIFICA">SELECCIONE</option>
                              <option value="S/F">S/F</option>
                              <option value="FACTURA">FACTURA</option>
                              <option value="PLANILLA">PLANILLA</option>
                              <option value="RxH">RxH</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                          <label for="numero_comprobante">N° de Comprobante<span class="text-danger">*</span></label>
                            <input type="text" id="numero_comprobante" class="form-control" name="numero_comprobante" value="{{ old('numero_comprobante') }}">
                          </div>
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

@section('scripts')
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
<!-- <script type="module">
import calculo from "{{asset('js/calculo.js')}}";
const app = new Vue({
    el: '#app-items',
    data: {
    },
    components:{
      calculo,
    }
  })
</script> -->
@endsection