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

            $comentario = Comentario::create([
            'contenido' => 'Este es un comentario principal.',
            'comentable_type' => Noticia::class,
            'comentable_id' => $noticia->id,
        ]);

        $comentario->save();
    }

    public function subcomentar(StoreComentarioRequest $request, Comentario $comentario )
    {
        $subComentario = Comentario::create([
            'contenido' => 'Este es un subcomentario.',
            'comentable_type' => Comentario::class,
            'comentable_id' => $comentario->id, // Asociamos este subcomentario al comentario principal
        ]);

        $subComentario->save();
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
