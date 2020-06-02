@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Crear Tarea {{$yearUnion->evaluation->name}}</h3>
            <div class="d-flex flex-row">
                <form action="{{ route('subject.desglose')}}" method="post">
                    @csrf
                    <input type="hidden" name="subject" value={{$yearUnion->subject_id}}>
                    <input type="hidden" name="year" value={{$yearUnion->year_id}}>
                    <input type="hidden" name="course" value={{$yearUnion->course_id}}>
                    <input type="hidden" name="evaluation" value={{$yearUnion->evaluation->id}}>
                    <button type="submit" class="btn btn-outline-warning float-right mr-1">Cancelar</button>
                </form>
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf
                    <button class="btn btn-outline-success float-right" type="submit">Guardar</button>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_task.png')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div class="form-group">
                    <label for="Porcentaje">Nombre Tarea</label>
                    <input type="porcentaje" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="Porcentaje">Tipos</label>
                    <select class="form-control" name="type">
                        @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="yearUnion" value={{$yearUnion->id}}>
            </div>
        </div>
        </form>
    </div>
</main>
@endsection