@extends('base')

@section('main')

<script src="{{ mix('/js/datatable.js') }}"></script>

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-4">Programación didáctica </h1>
        <div class="dropdown">
            <button class=" btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cursos
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">DAM</a>
                <a class="dropdown-item" href="#">DAW</a>
                <a class="dropdown-item" href="#">ASIR</a>
            </div>
        </div>  
        <div class="bd-highlight mb-3 tablas col-6 center">
            <div>
                <table id='tabla' class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{$subject->name}}</td>
                            <td>{{$subject->course_id}}</td>
                            <td class="botones">
                                <a href="#" class="btn btn-primary">Edit</a>
                                <form action="#" method="post">
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 
            <div>
                <table id='tablaUnidadesdadada' class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombresdadadad</th>
                            <th>Curso</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{$subject->name}}</td>
                            <td>{{$subject->course_id}}</td>
                            <td class="botones">
                                <a href="#" class="btn btn-primary">Edit</a>
                                <form action="#" method="post">
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 
        </div>        
    <div>
    </div>
    <div class="col-sm-12">
        
</main>
@endsection
