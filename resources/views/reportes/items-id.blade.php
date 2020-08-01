<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reportes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
  body{
    width:100vw;
  }
</style>
<body>
       <div class="container-fluid"> 
          <div class="row">
            <div class="col-12">
            <h5 class="text-center mb-2"><strong>REPORTE DETALLADO DE E/S - <strong>{{$project->nombre_proyecto}}</strong></strong></h5>
            <table class="table table-striped table-bordered">
                       <thead class="table-info">
                         <tr>
                        <th class="text-center col-md-1">ID</th>
                        <th class="text-center col-md-1">T. Operacion</th>
                        <th class="text-center col-md-1">Fech. Registro</th>
                        <th class="text-center col-md-1">Descripcion</th>
                        <th class="text-center col-md-1">Cantidad</th>
                        <th class="text-center col-md-1">Precio Unit. S/.</th>
                        <th class="text-center col-md-1">Total</th>
                        <th class="text-center col-md-1">T. Recurso</th>
                        <th class="text-center col-md-1">Proveedor</th>
                        <th class="text-center col-md-1">T. Comprob.</th>
                        <th class="text-center col-md-1">N° Comprob.</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($items as $item)
                        <tr>
                          <td class="text-center">{{$item->id}}</td>
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
       </div>
</body>
</html>