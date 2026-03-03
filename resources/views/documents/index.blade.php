<!DOCTYPE html>
<html>
<head>
    <title>Documentos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/documentos.js') }}"></script>
</head>
<body>
    <h2>Listado de Documentos</h2>
    <div style="display: flex; gap: 10px; margin-bottom: 1rem;">

        <form action="{{ route('documents.create') }}" method="get">
            <button type="submit">Crear Documento</button>
        </form>
        <form action="{{ route('usuarios.index') }}" method="get">
            <button type="submit">Volver a Usuarios</button>
        </form>
    </div>
    <table id="tabla" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $doc)
                <tr>
                    <td>{{ $doc->id }}</td>
                    <td>{{ $doc->title }}</td>
                    <td>
                        <div style="display: flex; gap: 5px; align-items: center;">
                            <form action="{{ route('documents.edit', $doc) }}" method="get">
                                <button type="submit">Editar</button>
                            </form>
                            <form action="{{ route('documents.destroy', $doc) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar documento?')">
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