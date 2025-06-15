<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Listado de Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $index => $usuario)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ ucfirst($usuario->role) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>