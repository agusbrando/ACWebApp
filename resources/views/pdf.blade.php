<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
    </style>
    
</head>

<body>
    <h1>Trackings de {{$user->first_name}}, {{$user->last_name}}</h1>
    <hr>
    <div class="contenido">
        <table class="table-striped table col-12 ">
            <thead class="bg-dark col-12 cabezeraTabla">
                <tr>
                    <td>Fecha Firma</td>
                    <td>Hora Inicio</td>
                    <td>Hora Final</td>
                    <td>Suma Horas</td>
                    <td>Firma</td>
                </tr>
            </thead>
            <tbody>
                @foreach($trackings as $tracking)
                
                <tr>
                    <td>{{$tracking->date_signature}}</td>
                    <td>{{$tracking->time_start}}</td>
                    <td>{{$tracking->time_end}}</td>

                    <td>{{$tracking->num_hours}}</td>

                    <td><img class="border" src="{{public_path().$tracking->signature}}" />
                    </td>
                </tr>
               
                @endforeach

            </tbody>

        </table>

    </div>
</body>

</html>