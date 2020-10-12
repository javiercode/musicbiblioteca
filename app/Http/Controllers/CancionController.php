<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancionList = Cancion::latest()->paginate(10);

        return view('cancion.index', compact('cancionList'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cancion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idAlbum' => 'required',
            'nombre' => 'required'
        ]);

        Cancion::create($request->all());

        return redirect()->route('cancion.index')
            ->with('success', 'Cancion creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(Cancion $cancion)
    {
        return view('cancion.show', compact('cancion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancion $cancion)
    {
        return view('cancion.edit', compact('cancion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancion $cancion)
    {
        $request->validate([
            'idAlbum' => 'required',
            'nombre' => 'required'
        ]);
        $cancion->update($request->all());

        return redirect()->route('cancion.index')
            ->with('success', 'Cancion actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancion $cancion)
    {
        $cancion->delete();

        return redirect()->route('cancion.index')
            ->with('success', 'Cancion eliminada satisfactoriamente');
    }
}
