@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Attachments</h1>
            <table id="tabla" class="table table-striped table-bordered">
                <thead class="cabezeraTabla">
                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Id Attachmentable</td>
                        <td>Tipo Attachmentable</td>
                        <td>Fecha Creado</td>
                        <td>Fecha Actualizado</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attachments as $attachment)
                        <tr>
                            <td>{{$attachment->id}}</td>
                            <td>{{$attachment->name}}</td>
                            <td>{{$attachment->attachmentable_id}}</td>
                            <td>{{$attachment->attachmentable_type}}</td>
                            <td>{{$attachment->created_at}}</td>
                            <td>{{$attachment->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
    </div>
    <div>
        <a style="margin: 19px;" href="{{ route('attachments.create')}}" class="btn btn-primary">Subir archivos</a>
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
                        className: 'btn-outline-success mr-2 boton'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-outline-danger mr-2 boton'
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