<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistaList = Artista::latest()->paginate(10);
        return view('artista.index', compact('artistaList'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artista.create');
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
            'nombre' => 'required'
        ]);

        Artista::create($request->all());

        return redirect()->route('artista.index')
            ->with('success', 'Artista creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artista = Artista::find($id);
        return view('artista.show', compact('artista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista=Artista::find($id);
        return view('artista.edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $artista=Artista::find($id);
        $artista->update($request->all());

        return redirect()->route('artista.index')
            ->with('success', 'Artista actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *

     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artista::destroy($id);
        return redirect()->route('artista.index')
            ->with('success', 'Artista eliminada satisfactoriamente');
    }
}
