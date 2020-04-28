@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Attachments</h1>
            <body>
                <div class="container lst">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>¡Lástima!</strong> Ha habido algún que otro problema.<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <form method="post" action="{{url('attachment')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="input-group hdtuto control-group lst increment">
                            <input type="file" name="name[]" class="myfrm form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Añadir</button>
                            </div>
                        </div>
                        <div class="clone hide">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="name[]" class="myfrm form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" style="margin-top:10px">Subir</button>
                    </form>
                </div>
            </body>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });

            $("body").on("click",".btn-danger",function() {
                $(this).parents(".hdtuto control-group lst").remove();
            });
        });
    </script>
</main>
@endsection