<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Documento</title>
    <style>
        label { display: block; margin-top: 10px; }
        .form-buttons { margin-top: 15px; display: flex; gap: 10px; }
    </style>
</head>
<body>
    <h2>Crear Documento</h2>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documents.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-buttons">
            <button type="submit">Guardar Documento</button>
            <button type="button" onclick="window.location='{{ route('documents.index') }}'">Volver</button>
        </div>
    </form>
</body>
</html>