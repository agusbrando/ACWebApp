@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Notas y Porcentages</h1>
        <div class="dropdown">
            <button class=" btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Asignatura
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>  
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="tablaPorcentajes porcentajes">
                <table class="table table-striped">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td></td>
                            <td>Porcentaje</td>
                            <td>Nota Minima</td>
                            <td>Nota Media</td>
                            <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trabajos</td>
                            <td>20%</td>
                            <td>4,00</td>
                            <td>5,00</td>
                            <td>
                                <a href="#" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="#" method="post">
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="tablaPorcentajes alumnos">
                <table class="table table-striped">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td>Nº</td>
                            <td>Apellidos, Nombre</td>
                            <td>Baja</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->last_name}} {{$user->first_name}}</td>
                            <td>No</td>
                            <td>
                                <a href="#" class="btn btn-danger">Baja</a>
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
