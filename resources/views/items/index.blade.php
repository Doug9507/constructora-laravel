@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header">Lista General de Registros de Entrada y Salida</div>

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
                        <th class="text-center">ID</th>
                        <th class="text-center">Obra</th>
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
                      </thead>
                      <tbody>
                        @foreach($items as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td class="text-center">{{$item->project->nombre_proyecto}}</td>
                          <td class="text-center">{{$item->tipo_operacion}}</td>
                          <td class="text-center">{{$item->fecha_registro}}</td>
                          <td class="text-center">{{$item->get_excerpt}}..</td>
                          <td class="text-center">{{$item->cantidad}}</td>
                          <td class="text-center">{{$item->precio_unitario}}</td>
                          <td class="text-center">{{$item->monto_total}}</td>
                          <td class="text-center">{{$item->tipo_recurso}}</td>
                          <td class="text-center">{{$item->proveedor}}</td>
                          <td class="text-center">{{$item->tipo_comprobante}}</td>
                          <td class="text-center">{{$item->numero_comprobante}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>     
            </div>
            {{$items->links()}}
        </div>
    </div> -->
    <a href="{{route('items.exportarItemPdf')}}" target="_blank" class="btn btn-sm btn-primary mb-2">Reporte</a>
    <div id="tabla">
         <v-app id="inspire">
            <v-card>
            <v-card-title>
            Lista General de Registros de Entrada y Salida
                <v-spacer></v-spacer>
                <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Buscar"
                single-line
                hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="proyectos"
                :search="search"
            ></v-data-table>
            </v-card>
            </v-app> 
    </div>
</div>
@endsection
