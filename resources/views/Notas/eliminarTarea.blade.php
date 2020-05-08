@extends('base')

@section('main')
<script>
    $('.my-select').selectpicker();
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Eliminar Tarea</h3>
        </div>
        <div class="card-body row no-gutters">
            <div class="table-responsive">
                <table class="table col-12 centro">
                    <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                        <tr id='columna'>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Evaluacion</th>
                            <th>Action</th>
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
        </div>
        <div class=" card-footer col-12">
            <a class="btn btn-outline-warning float-right" href="#" aria-disabled="true">Cancelar</a>
        </div>
        </form>
    </div>
</main>

@endsection