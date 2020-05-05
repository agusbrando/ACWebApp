@extends('base')

@section('main')
<!-- Script tabla de user -->
<script>
    $(document).ready(function() {
        $('#alumnos').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                extend: 'excel',
                className: 'btn-outline-success'
            }],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando START a END de un total de TOTAL Entradas",
                "infoEmpty": "No hay informacion",
                "infoFiltered": "(Filtrado de un total de MAX entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar MENU Entradas",
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
    <link href="{{ asset('css/table .css') }}" rel="stylesheet" type="text/css" />

    <table id="alumnos" class="table table-striped" style="width:100%">

        <thead class="cabezeraTabla">
            <tr>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Email</td>
                <td>Role id</td>
                <td>Accion</td>
            </tr>
        </thead>
        @foreach($users as $user)
        <tbody>
            <tr>
                <td>{{$user->first_name }}</td>
                <td>{{$user->last_name }}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_id }}</td>
                <td class="botones">
                    <form method="get" action="{{ route('users.show',$user->id)}}">
                        @csrf
                        @method('GET')
                        <button class="btn btn-primary" type="submit">Ver</button>
                    </form>
                </td>

            </tr>
        </tbody>
        @endforeach
    </table>

</main>
@endsection