@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#alumnos').DataTable( {
            dom : "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons:[
                { extend: 'excel', className: 'btn-outline-success' }
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ Entradas",
                "infoEmpty": "No hay informacion",
                "infoFiltered": "(Filtrado de un total de _MAX_ entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se han encontrado resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        } );
    } );
    
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
    <div class="d-flex flex-flow mb-4">
        <h1 class="display-4 pr-5">Notas y Porcentages</h1>
        <div class="dropdown">
            <button class=" btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Asignatura
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($subjects as $subject)
                <a class="dropdown-item" href="#">{{$subject->name}}</a>
                @endforeach
            </div>
        </div>  
        <button class="btn btn-secondary evaluaciones" type="submit">
            <a href="http://127.0.0.1:8000/evaluaciones">Evaluaciones</a>
        </button>
    </div>
        
        <div class="d-flex flex-row bd-highlight mb-3 mt-n3">
            <div class="tablaPorcentajes porcentajes">
                <table class="table table-striped mt-5">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td></td>
                            <td>Porcentaje</td>
                            <td>Nota Minima</td>
                            <td>Nota Media</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trabajos</td>
                            <td>20%</td>
                            <td>4,00</td>
                            <td>5,00</td>
                            <td>
                                <form action="#" method="post">
                                <button class="btn btn-danger" type="submit">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <form action="#" method="post">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Añadir
                    </button>
                </form>  
            </div> 
            <div class="tablaPorcentajes alumnos">
                <table id="alumnos" class="table table-striped" style="width:100%">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td>Nº</td>
                            <td>Apellidos, Nombre</td>
                            <td>Baja</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->last_name}} {{$user->first_name}}</td>
                            <td>No</td>
                            <td>
                                <a href="#" class="btn btn-danger">Baja</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 
        </div>        
    <div>
    </div>
    <div class="col-sm-12">
</main>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir porcentaje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="Porcentaje">Porcentaje</label>
            <input type="text" class="form-control" id="Porcentaje">
        </div>
        <div class="form-group">
            <label for="nota_min">Nota Minima</label>
            <input type="text" class="form-control" id="nota_min">
        </div>
        <div class="form-group">
            <label for="nota_med">Nota Maxima</label>
            <input type="text" class="form-control" id="nota_med">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>