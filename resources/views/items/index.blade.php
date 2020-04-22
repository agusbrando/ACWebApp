@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <!-- Listado de Items -->
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4">Material del Aula </h1>
            <form method="post" action="{{ url('items/filter') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="formControlSelect1">Aulas</label>
                    <select class="form-control" id="classroom_id" name="idClass">
                        <option value="" selected>Todas</option>
                        <!--Hace la funcion de un placeholder-->
                        @foreach($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="formControlSelect1">Tipo</label>
                    <select class="form-control" id="type_id" name="idType">
                        <option value="" selected>Todos</option>
                        <!--Hace la funcion de un placeholder-->
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="formControlSelect1">Estado</label>
                    <select class="form-control" id="state_id" name="idState">
                        <option  value="" selected>Todos</option>
                        <!--Hace la funcion de un placeholder-->
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            
            
            <!-- Enlace al form create -->
            <a class="btn btn-primary" href="/items/create" role="button">Añadir Material</a>
            <hr>
            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="container-fluid">
                    <table id='tabla' class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Fecha Compra</th>
                                <th>Id clase</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Fecha creación</th>
                                <th>Fecha actualización</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->date_pucharse}}</td>
                                <td>{{$item->classroom_id}}</td>
                                <td>{{$item->state_id}}</td>
                                <td>{{$item->type_id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td class="botones">
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <form action="#" method="post">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    </div>
    <script>
        // $(document).ready(function() {
        //     $('#datepicker').datepicker({
        //         language: 'es'
        //     });
        // });
        $(document).ready(function() {
            $('#tabla').DataTable({
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
                buttons: [{
                        extend: 'excel',
                        className: 'btn-outline-success mr-2'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-outline-danger mr-2'
                    }
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
            });
        });
    </script>


</main>
@endsection