<nav class="col-md-2 d-none d-md-block bg-light sidebar ">
    <div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link active" href="/">
            <span data-feather="home"></span>
            Muro <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('messages')}}">
            <span data-feather="layers"></span>
            Mensajes recibidos
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('messages_send')}}">
                <span data-feather="layers"></span>
            Mensajes enviados
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('messages.create')}}">
                    <span data-feather="layers"></span>
                Nuevo mensaje
                </a>
                </li>
        <li class="nav-item">
        <a class="nav-link" href="/seguimiento">
            <span data-feather="file"></span>
            Seguimiento
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/">
            <span data-feather="shopping-cart"></span>
            Asistencia
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/events">
            <span data-feather="users"></span>
            Calendario
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/horarios">
            <span data-feather="bar-chart-2"></span>
            Horario
        </a>
        </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administración</span>
        <a class="d-flex align-items-center text-muted" href="/">
        <span data-feather="plus-circle"></span>
        </a>
    </h6>
    <ul class="nav flex-column mb-2">
        <li class="nav-item">
        <a class="nav-link" href="/posts">
            <span data-feather="file-text"></span>
            Posts
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/asignaturas">
            <span data-feather="file-text"></span>
            Notas
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/programs">
            <span data-feather="file-text"></span>
            Programación
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/permissions">
            <span data-feather="file-text"></span>
            Permisos
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/users">
            <span data-feather="file-text"></span>
            Usuarios
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/roles">
            <span data-feather="file-text"></span>
            Roles
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/">
            <span data-feather="file-text"></span>
            Reserva de aulas
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/items">
            <span data-feather="file-text"></span>
            Stock
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/sessions">
            <span data-feather="file-text"></span>
            Sessions 
        <a class="nav-link" href="/courses">
            <span data-feather="file-text"></span>
            Cursos
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/states">
            <span data-feather="file-text"></span>
            States 
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/subjects">
            <span data-feather="file-text"></span>
            Subjects 
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/evaluations">
            <span data-feather="file-text"></span>
            Evaluations 
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/types">
            <span data-feather="file-text"></span>
            Types 
        </a>
        </li>
    </ul>
    </div>
</nav>
