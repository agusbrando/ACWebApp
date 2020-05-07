@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10">

    <link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Firmas de docente</h3>
            <div>



            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class=" col-12 col-md-8">


                <div class="filtro w-100">
                    <form method="get" action="{{ route('seguimiento.filtrar') }}">

                        @csrf

                        <table class="tabla w-100">

                            <tr>
                                <td class="class20">Filtrar por fecha:</td>
                                <td class="class20">Filtrar por semana:</td>
                                <td class="class20">Filtrar por mes:</td>
                                <td class="class20">Filtrar por año:</td>
                                <td class="class20"></td>
                            </tr>
                            <tr>
                                <td class="class20"><input type="date" class="rounded class20" name="fecha"></td>
                                <td class="class20"><input type="week" class="rounded class20" name="semana"></td>
                                <td class="class20"><input type="month" class="rounded class20" name="mes"></td>
                                <td class="class20"><input class="quantity rounded class20" type="number" name="anyo"></td>
                                <td class="class20"><input type="submit" class="btn btn-success boton class20" value="Filtrar"></td>
                            </tr>
                        </table>

                    </form>

                </div>


                <table class="tabla table-striped w-100">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td>Fecha Firma</td>
                            <td>Hora Inicio</td>
                            <td>Hora Final</td>
                            <td>Suma Horas</td>
                            <td>Firma</td>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($trackings as $tracking)
                        @if($tracking->user_id == $user->id)
                        <tr>
                            <td>{{$tracking->date_signature}}</td>
                            <td>{{$tracking->time_start}}</td>
                            <td>{{$tracking->time_end}}</td>

                            <td>{{$tracking->num_hours}}</td>

                            <td><img class="border" src="{{url($tracking->signature)}}" />
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                    <thead class="cabezeraTabla">
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Suma Horas Total:</td>
                            <td>{{$horas}}</td>
                            <td></td>
                        </tr>
                    </thead>
                </table>

            </div>
            <div class="col-md-4 border-left bg-light">

                <form method="post" action="{{ route('seguimiento.store') }}">
                    @csrf

                    <label for="date_start">Fecha de firma</label>
                    <input type="date" class="form-control w-100" id="date_start" name="date_start" value="">
                    <label for="time_start" class="w-100">hora inicio de firma</label>
                    <input type="time" class="form-control w-100" id="time_start" name="time_start">
                    <label for="time_end" class="w-100">hora fin de firma</label>
                    <input type="time" class="form-control w-100" id="time_end" name="time_end">


                    <br>

                    @if($user->signature!=null)

                    <img class="border" src="{{url($user->signature)}}"><br>
                    <label>Firma introducida,<a href="{{ route('seguimiento.edit', $user->id)}}">¿Quieres cambiar?</a></label>
                    @else
                    <label>No tienes firma,<a href="{{ route('seguimiento.edit', $user->id)}}">¿Quieres añadir?</a></label>
                    @endif
                    <br>
                    <input type="submit" class="btn btn-success w-50" value="firmar">

                </form>

            </div>
        </div>
        <div class=" card-footer col-12">
            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="developer_page"></ul>
            </div>
            <a class="btn btn-outline-success"> Descargar Excel </a>
            <a href="{{ route('print')}}" class="btn btn-outline-danger"> Descargar PDF </a>



        </div>
        </form>

    </div>

</main>


<script class="text/javascript">
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>

@endsection