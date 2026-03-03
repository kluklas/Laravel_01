<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('documents')->get();
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $documents = Document::all();
        return view('usuarios.create', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'correo' => 'required|email|unique:users,correo',
            'activo' => 'sometimes|boolean',
            'documents' => 'array'
        ]);

        $user = User::create([
            'nombre'=> $request->nombre,
            'correo' => $request->correo,
            'activo' => $request->has('activo'),
        ]);

        if ($request->documents) {
            $user->documents()->sync($request->documents);
        }

        return redirect()->route('usuarios.index');
    }

    public function edit(User $user)
    {
        $documents = Document::all();
        return view('usuarios.edit', compact('user', 'documents'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,correo,'.$user->id,
            'activo' => 'sometimes|boolean',
            'documents' => 'array'
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'activo' => $request->has('activo'),
        ]);

        $user->documents()->sync($request->documents ?? []);
        return redirect()->route('usuarios.index');
    }

    public function destroy(User $user)
    {
        $user->documents()->detach();
        $user->delete();
        return redirect()->route('usuarios.index');
    }
}