@extends('base')

@section('main')
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Asignaturas</h3>
            <div>
                <a class="btn btn-outline-info" href="#">Crear</a>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="table-responsive col">
                <table class="table table-striped" style="width:100%">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr>
                            <td>{{$subject->id}}</td>
                            <td>{{$subject->name}}</td>
                            <td class="w-25">
                                <div class="d-flex flex-row">
                                    <a href="{{ route('asignaturas.show', $subject->id) }}" class="btn btn-primary btn-sm mr-2">Evaluaciones</a>
                                    <a href="#" class="btn btn-primary btn-sm">Programacion</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" card-footer col-12">
            <a class="btn btn-outline-warning float-right" href="#" aria-disabled="true">Cancelar</a>
        </div>
    </div>
</main>
@endsection