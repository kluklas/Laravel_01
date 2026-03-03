<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Documento</title>
    <style>
        label { display: block; margin-top: 10px; }
        .form-buttons { margin-top: 15px; display: flex; gap: 10px; }
    </style>
</head>
<body>
    <h2>Editar Documento</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documents.update', $document) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $document->title) }}" required>
        </div>
        <div class="form-buttons">
            <button type="submit">Actualizar Documento</button>
            <button type="button" onclick="window.location='{{ route('documents.index') }}'">Volver</button>
        </div>
    </form>
</body>
</html>