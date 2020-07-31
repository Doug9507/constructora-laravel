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
            <h5 class="text-center mb-2"><strong>REPORTE GENERAL DE OBRAS</strong></h5>
            <table class="table table-striped table-bordered">
                       <thead class="table-info">
                         <tr>
                         <th class="text-center col-md-1">ID</th>
                        <th class="text-center col-md-2">Titulo de Obra</th>
                        <th class="text-center col-md-1">Saldo Contable</th>
                        <th class="text-center col-md-2">Entidad</th>
                        <th class="text-center col-md-2">Contratista</th>
                        <th class="text-center col-md-1">Monto Contratado</th>
                        <th class="text-center col-md-1">Inicio de Obra</th>
                        <th class="text-center col-md-1">Termino de Obra</th>
                        </tr>
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
                        </tr>
                        @endforeach
                      </tbody>
        </table>
            </div>
          </div>
       </div>
</body>
</html>