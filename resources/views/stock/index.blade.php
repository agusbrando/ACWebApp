@extends('base')

@section('login')
<form class="form-signin center">
    <img class="mb-4" src="{{ asset('img/Logo.png') }}" alt="" height="150">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Dirección de Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Dirección de Email" required autofocus>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Recordarme
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-3 mb-3 text-muted">&copy; Aula Campus 2020</p>
</form>
@endsection

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <!-- Table with panel -->
    <div class="card card-cascade narrower">

        <!--Card image-->
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-th-large mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-columns mt-0"></i>
                </button>
            </div>

            <a href="" class="white-text mx-3">Table name</a>

            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-pencil-alt mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="far fa-trash-alt mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-info-circle mt-0"></i>
                </button>
            </div>

        </div>
        <!--/Card image-->

        <div class="px-4">

            <div class="table-wrapper">
                <!--Table-->
                <table class="table table-hover mb-0">

                    <!--Table head-->
                    <thead>
                        <tr>
                            <th>
                                <input class="form-check-input" type="checkbox" id="checkbox">
                                <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                            </th>
                            <th class="th-lg">
                                <a>First Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Last Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox1">
                                <label class="form-check-label" for="checkbox1" class="label-table"></label>
                            </th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox2">
                                <label class="form-check-label" for="checkbox2" class="label-table"></label>
                            </th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox3">
                                <label class="form-check-label" for="checkbox3" class="label-table"></label>
                            </th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox4">
                                <label class="form-check-label" for="checkbox4" class="label-table"></label>
                            </th>
                            <td>Paul</td>
                            <td>Topolski</td>
                            <td>@P_Topolski</td>
                            <td>Paul</td>
                            <td>Topolski</td>
                            <td>@P_Topolski</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox5">
                                <label class="form-check-label" for="checkbox5" class="label-table"></label>
                            </th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Table-->
            </div>

        </div>

    </div>
    <!-- Table with panel -->
</main>
@endsection