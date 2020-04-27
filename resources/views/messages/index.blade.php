@extends('base')

@section('main')

<link href="{{ asset('css/messages.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4 mb-0">Mensajes</h1>
            <a href="{{ route('messages.create')}}" class="btn btn-primary m-3">Nuevo mensaje</a>

            <table id="alumnos" class="table table-striped" style="width:100%">
                <thead class="cabezeraTabla">
                    <tr>
                        <td>ID</td>
                        <td>Asunto</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>{{$message->subject}}</td>
                        <td>
                        <a href="/messages/{{$message->id}}" class="btn btn-primary">Ver</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</main>

@endsection
