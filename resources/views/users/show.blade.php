@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <!-- <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> -->


                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <span class="hidden-xs">Roby Baltaretu</span>
                        </div>
                        <div class="profile-usertitle-job">Developer
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->


                    <div class="portlet light bordered">
                        <!-- STAT -->
                        <div class="row list-separated profile-stat">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> Curso </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 2DAM </div>
                            </div>
                        </div>
                        <!-- END STAT -->
                        <div>
                            <h4 class="profile-desc-title">Selecciona opción</h4>
                            <!-- <span class="profile-desc-text"> En este apartado puedes modificar los usuarios </span> -->
                            <div class="margin-top-20 profile-desc-link">
                                <a>Editar</a>
                            </div>
                            <div class="margin-top-20 profile-desc-link">
                                <a>Eliminar</a>
                            </div>
                            <div class="margin-top-20 profile-desc-link">
                                <a>Modificar</a>
                            </div>
                        </div>
                    </div>

<!-- 

                </div>
            </div>
            <div class="col-md-9 order-content">

                <div class="form_main col-md-4 col-sm-5 col-xs-7">
                    <h4 class="heading"><strong>Editar </strong> Usuario <span></span></h4>
                    <div class="form">
                        <form action="" method="" id="contactFrm" name="contactFrm">
                            <input type="text" required="" placeholder="Nombre" value="" name="name" class="txt">
                            <input type="text" required="" placeholder="Apellidos" value="" name="name" class="txt">
                            <input type="text" required="" placeholder="Email" value="" name="email" class="txt"><br>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div> -->
</main>
@endsection