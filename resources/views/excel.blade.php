<?php
header("Pragma: public");
header("Expires: 0");
$filename = "trackings.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
       
        thead{
            color:white;
            background-color: #2F2F2F;
            text-align: center;
            
        }
        td{
           width: 200px;
           text-align: center;
           border:2px solid #2F2F2F;
        }
        img{
            width:10px;
        }
        
        
    </style>
    
</head>
<body>
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
</body>