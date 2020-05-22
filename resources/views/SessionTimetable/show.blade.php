@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
    
        <div class="card shadow">
            <div class="card-header row m-0 justify-content-between">
                <a href="" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
                <form action="{{ route('session.edit', ['id'=> $session_timetable[0]->id)]}}" method="get">
                        @csrf

                        <button class="btn btn-outline-primary  float-right m-1" type="submit">Editar</button>
                    </form>
                
                    <form action="{{ route('sessiontimetable.destroy', $session_timetable[0]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger  float-right m-1" type="submit">Borrar</button>
                    </form> 
            </div>
            <div class="card-body row no-gutters">
                 
            </div>
            <div class="card-footer col-12">
                <div class="col-md-12 text-center">

                </div>
            </div>
        </div>
    </div>

</main>
@endsection