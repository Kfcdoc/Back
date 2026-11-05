<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    // Lista todos los libros (200 OK)
    public function index()
    {
        $libros = Libro::all();
        return response()->json($libros, 200);
    }

    // Crea un libro nuevo (201 Created, 422 si falla la validación)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo'           => 'required|string|max:255',
            'autor'            => 'required|string|max:255',
            'genero'           => 'nullable|string|max:255',
            'anio_publicacion' => 'nullable|integer',
        ]);

        $libro = Libro::create($validated);

        return response()->json($libro, 201);
    }

    // Muestra un libro por su _id (200 OK, 404 si no existe)
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return response()->json($libro, 200);
    }

    // Actualiza un libro (200 OK, 404 si no existe)
    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $validated = $request->validate([
            'titulo'           => 'string|max:255',
            'autor'            => 'string|max:255',
            'genero'           => 'nullable|string|max:255',
            'anio_publicacion' => 'nullable|integer',
        ]);

        $libro->update($validated);

        return response()->json($libro, 200);
    }

    // Elimina un libro (204 No Content, 404 si no existe)
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return response()->json(null, 204);
    }
}
