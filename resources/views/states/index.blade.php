@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/state.css') }}" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
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
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <!-- Listado de Items -->
    <div class="row d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12">
            <h1 class="display-4">Estados de un Objeto</h1>

            <div class="d-flex flex-row botones">
                <a class="btn btn-primary" href="/states/create" role="button">Añadir Estado</a>
            </div>

            <!-- Enlace al form create -->
            <br>
            <hr>

            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="table-states container-fluid">
                    <table id='mytable' class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($states as $state)
                            <tr>
                                <td>{{$state->id}}</td>
                                <td>{{$state->name}}</td>


                                <!-- <td class="botones">
                                    <form method="get" action="{{ route('states.show', $state->id)}}">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </form>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div>    
                    cacahuete
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
@endsection