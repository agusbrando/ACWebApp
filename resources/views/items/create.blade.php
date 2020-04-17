@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿En que Aula va a estar?</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($classrooms as $classroom)
                    <option>{{$classroom->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de objeto</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($types as $type)
                    <option>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Observaciones</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>
</main>
@endsection