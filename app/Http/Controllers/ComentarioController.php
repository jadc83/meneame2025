<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Models\Comentario;
use App\Models\Noticia;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComentarioRequest $request, Noticia $noticia)
    {

        Comentario::create([
            'contenido' => $request->contenido, // Contenido del subcomentario desde el formulario
            'comentable_type' => $request->comentable_type, // Indica que el padre es otro comentario
            'comentable_id' => $request->comentable_id, // ID del comentario al que responde
        ]);

        return back()->with('success', 'Comentario agregado correctamente.');

    }

    public function subcomentar(StoreComentarioRequest $request)
    {

        Comentario::create([
            'contenido' => $request->contenido, // Contenido del subcomentario desde el formulario
            'comentable_type' => $request->comentable_type, // Indica que el padre es otro comentario
            'comentable_id' => $request->comentable_id, // ID del comentario al que responde
        ]);

        return back()->with('success', 'Subcomentario agregado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
