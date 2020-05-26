@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10">
    <link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
        <a href="/seguimiento" class="my-auto mx-2 h5 float-left"><i class="fas fa-arrow-left"></i></a> 
        <h3 class="float-left">Firma de {{$user->first_name}}, {{$user->last_name}}</h3>    
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 border-left bg-light">
                <div class="col-12 col-md-8 col-lg-10 p-3">
                <form method="post" action="{{ route('seguimiento.store') }}">
                    @csrf
                    <div class="form-group">
                    <label for="date_start">Fecha de firma</label>
                    <input type="date" class="form-control " id="date_start" name="date_start" value="">
                    </div>
                    <div class="form-group">
                    <label for="time_start" >hora inicio de firma</label>
                    <input type="time" class="form-control " id="time_start" name="time_start">
                    </div>
                    <div class="form-group">
                    <label for="time_end" >hora fin de firma</label>
                    <input type="time" class="form-control " id="time_end" name="time_end">
                    </div>
                    <br>
                    @if($user->signature!=null)
                    <img class="border" src="{{url($user->signature)}}"><br>
                    <label>Firma introducida,<a href="{{ route('seguimiento.edit', $user->id)}}">¿Quieres cambiar?</a></label>
                    @else
                    <label>No tienes firma,<a href="{{ route('seguimiento.edit', $user->id)}}">¿Quieres añadir?</a></label>
                    @endif
                    <br>
                    @if(in_array('Modificar_trackings', Session::get('user_permissions')))
                    <input type="submit" class="btn btn-success col-3" value="firmar">
                    @endif
                    <br>
                </form>
            </div>
        </div>
        <div class=" card-footer col-12">
            <div class="col-md-12 text-center">          
            </div>
        </div>
        </form>
    </div>
</main>

@endsection
