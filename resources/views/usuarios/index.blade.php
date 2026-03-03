<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/usuarios.js') }}"></script>
</head>
<body>
    <h2>Listado de Usuarios</h2>
    <div style="display: flex; gap: 10px; margin-bottom: 1rem;">
        <form action="{{ route('usuarios.create') }}" method="get">
            <button type="submit">Crear Usuario</button>
        </form>
        <form action="{{ route('documents.index') }}" method="get">
            <button type="submit">Gestionar Documentos</button>
        </form>
    </div>
    <table id="tabla" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Activo</th>
                <th>Documentos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->correo }}</td>
                    <td>{{ $user->activo ? 'Sí' : 'No' }}</td>
                    <td>
                        {{ $user->documents->pluck('title')->join(', ') }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px; align-items: center;">
                            
                            <form action="{{ route('usuarios.edit', $user) }}" method="get">
                                <button type="submit">Editar</button>
                            </form>

                            <form action="{{ route('usuarios.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar usuario?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>