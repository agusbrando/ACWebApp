@extends('base')
@section('main')
<link href="{{ asset('css/messages.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Usuarios</h3>
            <div>
            @if(in_array('Crear_message', Session::get('user_permissions')))
            <a class="btn btn-outline-success" href="{{ route('messages.create')}}">Añadir</a>
            @endif
            </div>
            
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Adjuntos</th>
                        @if ($isSend == 1)
                        <th scope="col">Visto</th>
                        @endif
                        @if(in_array('Listar_message', Session::get('user_permissions')))
                        <th scope="col">Accion</th>
                        @endif
                    </tr>
                </thead>
                @foreach($messages as $message)
                @if ($isSend == 1)
                @foreach ($message->users as $user)
                <tbody>
                    <tr>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{count($message->attachments)}}</td>
                        @if ($user->pivot->read == 0)
                        <td>No se ha visto</td>
                        @else
                        <td>Ha sido visto</td>
                        @endif
                        @if(in_array('Leer_message', Session::get('user_permissions')))
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('messages.show',$message->id)}}">Ver</a>
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
                @else
                    <td>{{$message->user->first_name}} {{$message->user->last_name}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{count($message->attachments)}}</td>
                    @if(in_array('Leer_message', Session::get('user_permissions')))
                    <td class="botones">
                        <a class="btn btn-outline-primary" href="{{ route('messages.show',$message->id)}}">Ver</a>
                    </td>
                    @endif
                </tbody>
                @endif
                @endforeach
            </table>
        </div>
        <div class=" card-footer col-12">
            <nav class="col-5" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection
