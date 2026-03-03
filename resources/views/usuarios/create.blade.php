<!-- resources/views/usuarios/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <style>
        label { display: block; margin-top: 10px; }
        .checkbox-group { margin-top: 10px; }
        .form-buttons { margin-top: 15px; display: flex; gap: 10px; }
    </style>
</head>
<body>
    <h2>Crear Usuario</h2>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div>
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="{{ old('correo') }}" required>
        </div>
        <div class="checkbox-group">
            <label>
                Activo 
                <input type="checkbox" name="activo" value="1" {{ old('activo', true) ? 'checked' : '' }}>
            </label>
        </div>
        <div class="checkbox-group">
            <label>Documentos:</label>
            @foreach($documents as $doc)
                <label>
                    <input type="checkbox" name="documents[]" value="{{ $doc->id }}" 
                        {{ in_array($doc->id, old('documents', [])) ? 'checked' : '' }}>
                    {{ $doc->title }}
                </label>
            @endforeach
        </div>
        <div class="form-buttons">
            <button type="submit">Guardar Usuario</button>
            <button type="button" onclick="window.location='{{ route('usuarios.index') }}'">Volver</button>
        </div>
    </form>
</body>
</html>