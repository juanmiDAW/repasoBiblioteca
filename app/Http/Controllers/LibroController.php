<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;
use App\Models\Libro;

use function PHPUnit\Framework\returnSelf;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('libros.index', ['libros' => Libro::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibroRequest $request)
    {
        $request->validated();
        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
        ]);
        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)

    {
        $libro = Libro::with('ejemplares.prestamos')->where('id', $libro->id)->first();
        return view('libros.show', ['libro' => $libro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', ['libro' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibroRequest $request, Libro $libro)
    {
        $validate = $request->validated();

        $libro->fill($validate);

        $libro->save();

        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index');
    }
}
