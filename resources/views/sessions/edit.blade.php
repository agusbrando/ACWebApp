@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Detalles Sesiones</h3>
            <form action="{{ route('sessions.update',$session->id)}}" method="POST">
                @method('PATCH')
                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        @csrf
                        <a class="btn btn-outline-warning float-right" href="{{ route('sessions.show',$session->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    </div>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_session.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="formControlSelect1">Aula</label>
                            <select class="form-control @error('classroom') is-invalid @enderror" id="classroom" name="classroom">
                                @foreach($classrooms as $classroom)
                                    @if($classroom->id == $session->classroom_id)
                                        <option selected value="{{$classroom->id}}">{{$classroom->name}}</option>
                                    @else
                                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                @foreach($types as $type)
                                    @if($type->id == $session->type_id)
                                        <option selected value="{{$type->id}}">{{$type->name}}</option>
                                    @else
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day">Dia de la semana</label>
                            <select name="day" id="day" class="form-control @error('day') is-invalid @enderror">                                
                                @foreach($days as $key=>$day)
                                    @if($day == $days[$session->day])
                                        <option selected value="{{$days[$session->day]}}">{{$days[$session->day]}}</option>
                                    @else
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time_start">Hora de Fin</label>
                            <input value="{{$session->time_start}}" class="form-control @error('time_start') is-invalid @enderror form-control" type="time" id="time_start" name="time_start">
                        </div>
                        <div class="form-group">
                            <label for="time_end">Hora de Fin</label>
                            <input value="{{$session->time_end }}" class="form-control @error('time_end') is-invalid @enderror form-control" type="time" id="time_end" name="time_end">
                        </div>
                    </fieldset>
                    @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        </form>
    </div>
</main>
@endsection

