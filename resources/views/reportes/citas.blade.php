<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte General de Citas</h2>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Corte</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->usuario->name ?? $cita->nombre_cliente }}</td>
                    <td>{{ $cita->corte_cabello }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>{{ ucfirst($cita->estado) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>