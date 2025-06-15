<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Citas del Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Listado de Citas - {{ auth()->user()->name }}</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Corte</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $index => $cita)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->corte_cabello }}</td>
                <td>{{ ucfirst($cita->estado) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
