<?php
header("Pragma: public");
header("Expires: 0");
$filename = "{{$program->name}}.xls";
header("Content-type:  application/vnd.ms-excel;charset=iso-8859-15");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>

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
        h2 {
            text-align: center;
        }
        .contenido {
            font-size: 14px;
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
        table,td, tr{
            border-collapse: collapse;
            border: 1px solid #2F2F2F;

        }
        
        .thead-dark{
            color: white;
            background-color: #6e6e6e;
            text-align: center;
            border: 1px solid #2F2F2F;

        }
        .text-center{
            text-align: center;
        }
        td {
            width: 200px;
            text-align: center;
        }
        .float-left{
            float:left;
        }
        .float-right{
            float:right;
        }
        img {
            width: 200px;
        }
        .page-break {
            page-break-after: always;
        }

        .margin-top{
            margin-top:30px;
        }
        .no-wrap{
            white-space: nowrap;

        }
        table{
            margin: 0 auto;
        }
        .table *{
            padding:5px;
        }
        .ajustar{
            width:fit-content;
        }
        .padding{
            padding-left:100px;
        }
        h4{
            text-decoration:underline;
        }
        .tableEvaluar *{
            border:0px;
        }
        table.tableEvaluar{
            border:0px;
            margin-top:10px
        }
        .tableEvaluar .thead-dark{
            color:black;
            background-color: white;
            text-decoration:underline;
            
        }
        .text-justify{
            text-align: justify;
            text-justify: inter-word;
        }
    </style>

</head>

<body>

    <h3>{{$program->name}}</h3>
    <hr>

    <div class="contenido">
       
        <h2>Unidades</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Contenido</th>
                    <th>F. inicio/final previstas</th>
                    <th>Eval. prevista</th>
                    <th>F. inicio/final</th>
                    <th>Eval.</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach($program->units as $unidad)
                <tr>
                    <td>{{$unidad->name}}</td>
                    <td class="no-wrap ajustar">{{date('d/m/Y',strtotime($unidad->expected_date_start))}} - {{date('d/m/Y',strtotime($unidad->expected_date_end))}}</td>
                    <td class="ajustar">{{$unidad->expected_eval}}</td>
                    @if(($unidad->date_start)!=null)
                    <td class="no-wrap ajustar">{{date('d/m/Y',strtotime($unidad->date_start))}} - {{date('d/m/Y',strtotime($unidad->date_end))}}</td>
                    @else
                    <td></td>
                    @endif
                    <td class="ajustar">{{$unidad->eval}}</td>
                </tr>
                <tr>
                    <td class="thead-dark">Observaciones</td>
                    <td colspan="4" class="text-justify">{{$unidad->notes}}</td>
                </tr>
                <tr>
                    <td class="thead-dark">Acciones de Mejora</td>
                    <td colspan="4" class="text-justify">{{$unidad->improvements}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-break"></div>
        <hr>
        <h2>Aspectos Evaluados</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Aspecto Evaluado</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($program->evaluables as $evaluable)
                <tr>
                    <td>{{$evaluable->name}}</td>
                    <td>{{$evaluable->pivot->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-break"></div>
        <hr>
        <h2>Evaluación de la Programación</h2>
        <br>

        @foreach($program->yearUnions as $i=>$yearUnion)
            @if($evaluado[$i+1])
            <h2>{{$yearUnion->evaluation->name}}</h2>     

                <h4>Notas</h4>
                <div class="text-justify">{{$notas[$i+1]}}</div>
            <table class="tableEvaluar text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Fecha de comprobación</th>
                        <th>Responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{date('d/m/Y',strtotime($fechas[$i+1]))}}</td>
                        <td class="no-wrap">{{$responsable[$i+1]->first_name}} {{$responsable[$i+1]->last_name}}</td>
                    </tr>
                </tbody>
            </table>
            @else
            @endif
        @endforeach
    </div>

</body>

</html>