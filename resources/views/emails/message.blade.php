<body>
    <div>
        <div>
            <h1>AULACAMPUS</h1>
        </div>
        <div>
            <p>Hola {{$username}} {{$userlastname}},</p>
            <p>¡Te informamos de que tienes un nuevo mensaje disponible en la plataforma!</p>
            <div style="color: gray">
                <p>Asunto: {{ $messageSubject }}</p>
                <p>Total de adjuntos: {{ $attachmentscount }}</p>
            </div>
            <h3><a style="color: rgb(72, 115, 255);text-decoration: none;" href="{{$url}}">Accede aquí</a></h3>
        </div>
    </div>
</body>
