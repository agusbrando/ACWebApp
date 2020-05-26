@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />
    
        <div class="card shadow">
            <div class="card-header row m-0 justify-content-between">
                <a href="/horarios" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="card-body row no-gutters">
                <form method="post" action="{{ route('horarios.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="date_start">Fecha de inicio del horario</label>
                        <input type="date" class="form-control" id="date_start" name="date_start">
                    </div>
                    <div class="form-group">
                        <label for="date_end">Fecha de fin del horario</label>
                        <input type="date" class="form-control" id="date_end" name="date_end">
                    </div>


                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                    </div>
                </form>
            </div>
            <div class="card-footer col-12">
                <div class="col-md-12 text-center">

                </div>
            </div>
        </div>
    </div>

</main>
@endsection