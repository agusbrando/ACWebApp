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
                        @if ($sitio == 0)
                        <td>Visto</td>
                        @endif
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    @if ($sitio == 0)
                    @foreach ($message->users as $user)
                    {{-- Envidados --}}
                    <tr>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{count($message->attachments)}}</td>
                        @if ($user->pivot->read == 0)
                        <td>No se ha visto</td>
                        @else
                        <td>Ha sido visto</td>
                        @endif
                        <td>
                            <div class="containerAttachment">
                        <a href="/sended/{{$message->id}}" class="btn btn-primary">Ver</a>
                        <form action="{{ route('messages.destroy', $message->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>{{$message->user->first_name}} {{$message->user->last_name}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{count($message->attachments)}}</td>
                        <td>
                            <div class="containerAttachment">
                        <a href="/messages/{{$message->id}}" class="btn btn-primary">Ver</a>
                        <form action="{{ route('messages.destroy', $message->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </div>
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
