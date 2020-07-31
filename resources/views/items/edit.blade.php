@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar E/S</div>

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

                    <form action="{{route('items.update',$item)}}" method="POST">
                    @method('PUT')
                    <div class="form-group row">
                          <div class="col-md-4">
                            <label for="tipo_operacion">Tipo de Operacion<span class="text-danger">*</span></label>
                            <select class="form-control" id="tipo_operacion" name="tipo_operacion">
                              <option value="{{$item->tipo_operacion}}">{{ old('tipo_operacion',$item->tipo_operacion) }}</option>
                              @if($item->tipo_operacion == "INGRESO")
                              <option value="EGRESO">EGRESO</option>
                              @endif

                              @if($item->tipo_operacion == "EGRESO")
                              <option value="INGRESO">INGRESO</option>
                              @endif
                             
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label for="fecha_registro">Fecha Registro<span class="text-danger">*</span></label>
                            <input type="date" id="fecha_registro" class="form-control" name="fecha_registro" value="{{ old('fecha_registro',$item->fecha_registro) }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="descripcion">Descripcion</label>
                          <textarea name="descripcion" id="descripcion" rows="2" class="form-control">{{ old('descripcion',$item->descripcion) }}</textarea>
                      </div>
                      <div class="form-group row justify-content-md-center">
                          <div class="col-md-3">
                            <label for="cantidad">Cantidad<span class="text-danger">*</span></label>
                            <input type="number" id="cantidad" class="form-control" name="cantidad" value="{{ old('cantidad',$item->cantidad) }}">
                          </div>
                          <div class="col-md-4">
                            <label for="precio_unitario">Precio Unitario<span class="text-danger">*</span></label>
                            <input type="number" id="precio_unitario" class="form-control" name="precio_unitario" value="{{ old('precio_unitario',$item->precio_unitario) }}">
                          </div>
                          <div class="col-md-4">
                            <label for="monto_total">Monto Total<span class="text-danger">*</span></label>
                            <input type="number" id="monto_total" class="form-control" name="monto_total" value="{{ old('monto_total',$item->monto_total) }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-4">
                            <label for="tipo_recurso">Tipo de Recurso<span class="text-danger">*</span></label>
                            <select class="form-control" id="tipo_recurso" name="tipo_recurso">
                            <option value="{{$item->tipo_recurso}}">{{ old('tipo_recurso',$item->tipo_recurso) }}</option>
                              @switch($item->tipo_recurso)
                                @case("MATERIAL"):
                                  <option value="MANO DE OBRA">MANO DE OBRA</option>
                                  <option value="EQUIPOS Y/O HERR.">EQUIPOS Y/O HERR.</option>
                                  <option value="SUB-CONTRATOS">SUB-CONTRATOS</option>
                                  <option value="GASTOS GENERALES">GASTOS GENERALES</option>
                                @break
                                @case("MANO DE OBRA"):
                                  <option value="MATERIAL">MATERIAL</option>
                                  <option value="EQUIPOS Y/O HERR.">EQUIPOS Y/O HERR.</option>
                                  <option value="SUB-CONTRATOS">SUB-CONTRATOS</option>
                                  <option value="GASTOS GENERALES">GASTOS GENERALES</option>
                                @break
                                @case("EQUIPOS Y/O HERR."):
                                  <option value="MATERIAL">MATERIAL</option>
                                  <option value="MANO DE OBRA">MANO DE OBRA</option>
                                  <option value="SUB-CONTRATOS">SUB-CONTRATOS</option>
                                  <option value="GASTOS GENERALES">GASTOS GENERALES</option>
                                @break
                                @case("SUB-CONTRATOS"):
                                  <option value="MATERIAL">MATERIAL</option>
                                  <option value="MANO DE OBRA">MANO DE OBRA</option>
                                  <option value="EQUIPOS Y/O HERR.">EQUIPOS Y/O HERR.</option>
                                  <option value="GASTOS GENERALES">GASTOS GENERALES</option>
                                @break
                                @case("GASTOS GENERALES"):
                                  <option value="MATERIAL">MATERIAL</option>
                                  <option value="MANO DE OBRA">MANO DE OBRA</option>
                                  <option value="EQUIPOS Y/O HERR.">EQUIPOS Y/O HERR.</option>
                                  <option value="SUB-CONTRATOS">SUB-CONTRATOS</option>
                                @break
                                @default
                              @endswitch
                            </select>
                          </div>
                          <div class="col-md-8">
                          <label for="proveedor">Proveedor<span class="text-danger">*</span></label>
                            <input type="text" id="proveedor" class="form-control" name="proveedor" value="{{ old('proveedor',$item->proveedor) }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-4">
                            <label for="tipo_comprobante">Tipo de Comprobante<span class="text-danger">*</span></label>
                            <select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
                            <option value="{{$item->tipo_comprobante}}">{{ old('tipo_comprobante',$item->tipo_comprobante) }}</option>
                              @switch($item->tipo_comprobante)
                                @case("S/F"):
                                  <option value="FACTURA">FACTURA</option>
                                  <option value="PLANILLA">PLANILLA</option>
                                  <option value="RxH">RxH</option>
                                @break
                                @case("FACTURA"):
                                  <option value="S/F">S/F</option>
                                  <option value="PLANILLA">PLANILLA</option>
                                  <option value="RxH">RxH</option>
                                @break
                                @case("PLANILLA"):
                                  <option value="S/F">S/F</option>
                                  <option value="FACTURA">FACTURA</option>
                                  <option value="RxH">RxH</option>
                                @break
                                @case("RxH"):
                                  <option value="S/F">S/F</option>
                                  <option value="FACTURA">FACTURA</option>
                                  <option value="PLANILLA">PLANILLA</option>
                                @break
                                @default
                              @endswitch
                            </select>
                          </div>
                          <div class="col-md-4">
                          <label for="numero_comprobante">N° de Comprobante<span class="text-danger">*</span></label>
                            <input type="text" id="numero_comprobante" class="form-control" name="numero_comprobante" value="{{ old('numero_comprobante',$item->numero_comprobante) }}">
                          </div>
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