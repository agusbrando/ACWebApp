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

        .border {
            border: 1px solid black;
        }

        thead {
            color: white;
            background-color: #2F2F2F;
            text-align: center;

        }

        td {
            width: 200px;
            text-align: center;
            border: 2px solid #2F2F2F;
        }

        img {
            width: 200px;
        }
    </style>

</head>

<body>

    <h3>{{$yearUnions->first()->course->level}}º {{$yearUnions->first()->course->abbreviation}} - {{$yearUnions->first()->classroom->name}}</h3>
    <hr>

    <div class="contenido">
        @foreach($yearUnions as $yearUnion)
        <h2>{{$yearUnion->evaluation->name}}</h2>
        <table id='mytable' class="table w-100">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>

                @foreach($yearUnion->users as $user)


                <tr>

                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td class="botones d-flex flex-wrap border border-bottom-0 border-left-0 border-right-0 ">
                        @foreach($user->pivot->items as $item)
                        @if($item != null || $item != "")
                        {{"Nº ".$item->number." - ".$item->name}}
                        @else
                        "Sin Items"
                        @endif
                        @endforeach
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>
</body>

</html>