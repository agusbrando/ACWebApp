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
                        <td>Usuario</td>
                        <td>Asunto</td>
                        <td>Adjuntos</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($messages as $message)
                    @if (isset($message->users))
                    @foreach ($message->users as $user)

                    <tr>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{count($message->attachments)}}</td>
                        <td>
                        <a href="/messages/{{$message->id}}" class="btn btn-primary">Ver</a>

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>{{$message->user->first_name}} {{$message->user->last_name}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{count($message->attachments)}}</td>
                        <td>
                        <a href="/messages/{{$message->id}}" class="btn btn-primary">Ver</a>

                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</main>

@endsection
