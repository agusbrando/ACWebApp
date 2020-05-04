@extends('base')

@section('main')
<script>
    $('.my-select').selectpicker();
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    <div class="container">
        <h1 class="display-4 pr-5">Eliminar Tarea</h1>
        <hr>
        <table id="trabajos" class="table table-striped examenes" style="width:100%">

            <thead class="cabezeraTabla">
                <tr id='columna'>
                    <td>Tipo</td>
                    <td>Nombre</td>
                    <td>Evaluacion</td>
                    <td>Action</td>
                </tr>
            </thead>
            @foreach($tasks as $task)
            <tbody>
                <td>{{$task->type->name}}</td>
                <td>{{$task->name}}</td>
                <td>{{$task->evaluation->name}}</td>
                <td>
                    <a href="{{url('/tareas/eliminar', ['task_id'=> ($task->id), 'subject_id'=> ($subject->id)])}}" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                </td>

            </tbody>
            @endforeach
        </table>
    </div>
</main>
@endsection