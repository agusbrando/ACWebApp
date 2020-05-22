@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />
    
        <div class="card shadow">
            <div class="card-header row m-0 justify-content-between">
                <a href="/horarios" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="card-body row no-gutters">
                <form method="post" action="{{ route('sessiontimetable.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="timetable">Horario:</label>
                        <input type="text" class="form-control" id="name" name="timetable" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="sesion">Sesión:</label>
                        <select class="form-control" id="classroom" name="sesion">
                                
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="asignatura">Asignatura</label>
                        
                        <select class="form-control" id="asignatura" name="asignatura">
                                
                            </select>
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