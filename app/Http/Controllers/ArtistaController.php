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
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        return view('artista.show', compact('artista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit(Artista $artista)
    {
        return view('artista.edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artista $artista)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $artista->update($request->all());

        return redirect()->route('artista.index')
            ->with('success', 'Artista actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artista $artista)
    {
        print_r($artista);
//        $mail=Artista::find(2);
//        $mail->delete($mail->id);
//        print_r($artista->toArray());
//        echo $artista->id();
//        $artista->delete();

//        $user = Artista::find($artista->id);
//        $user->delete();
//        return redirect()->route('artista.index')
//            ->with('success', 'Artista eliminada satisfactoriamente');
    }
}
