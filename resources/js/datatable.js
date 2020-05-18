$(document).ready(function() {
    $('#tabla').DataTable( {
        dom : "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
        buttons: [
            { extend: 'excel', className: 'btn-outline-success mr-2' }, 
            { extend: 'pdf', className: 'btn-outline-danger mr-2' }
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