<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Categoria;
use App\Models\Meneo;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $noticias = Noticia::all();
        return view('noticias.index', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('noticias.create', ['categorias' => $categorias] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {
        $noticia = new Noticia();
        $noticia->user_id = Auth::id();
        $noticia->fill($request->validated());


        if ($request->hasFile('imagen')) {
            $fotoPath = $request->file('imagen')->store('fotos', 'public');
            $noticia->imagen = $fotoPath;
        }

        $noticia->save();

        return redirect()->route('noticias.index')->with('success', 'Noticia creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', ['noticia' => $noticia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        $categorias = Categoria::all();
        return view('noticias.edit', ['noticia' => $noticia, 'categorias' => $categorias] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {

        $noticia->update($request->validated());
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('fotos', 'public');
            $noticia->imagen = $ruta;
        }

        $noticia->save();

        return redirect()->route('noticias.index')->with('success', 'Noticia creada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada con éxito.');
    }

    public function menear(Noticia $noticia)
    {
        $meneo = new Meneo();
        $meneo->user_id = Auth::id();
        $meneo->noticia_id = $noticia->id;

        $comprobar = DB::table('meneos')
                        ->where('user_id', $meneo->user_id)
                        ->where('noticia_id', $noticia->id)
                        ->exists();

    if ($comprobar) {
        return redirect()->route('noticias.index')->with('error', 'Ya has meneado esta noticia.');
    }
        $meneo->save();
        return redirect()->route('noticias.index')->with('success', 'Noticia meneada con éxito.');
    }

    public function desmenear(Noticia $noticia)
    {
        $meneo = Meneo::where('user_id', Auth::id())
                      ->where('noticia_id', $noticia->id)
                      ->first();

        if ($meneo) {
            $meneo->delete();

            return redirect()->route('noticias.index')->with('success', 'Noticia desmeneada con éxito.');
        }

        return redirect()->route('noticias.index')->with('error', 'No existe el meneo para esta noticia.');

    }
}
