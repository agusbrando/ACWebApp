@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Añadir Attachment</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br/>
                @endif
                <form method="post" action="{{ route('attachments.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="attachmentable_id">Id Attachmentable:</label>
                            <input type="number" class="form-control" name="attachmentable_id"/>
                        </div>
                        <div class="form-group">
                            <label for="attachmentable_type">Attachmentable Type:</label>
                            <input type="text" class="form-control" name="attachmentable_type"/>
                        </div>
                        <button type="submit" class="btn btn-primary-outline">Añadir Attachment</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection