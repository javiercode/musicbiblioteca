<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumList = Album::latest()->paginate(10);

        print_r($albumList);

        $albumList = DB::table('album')
            ->join('artista', 'album.idArtista', '=', 'artista.id')
            ->select('album.*', 'artista.nombre as artista')
            ->latest()->paginate(10);
        print_r($albumList);
        return view('album.index', ['albumList'=>$albumList])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistaList = Artista::orderBy('nombre', 'desc')
            ->get()->toArray();
        return view('album.create',compact('artistaList'));
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
            'nombre' => 'required',
            'idArtista' => 'required',
            'gestionLanzamiento' => 'required'
        ]);

        Album::create($request->all());

        return redirect()->route('album.index')
            ->with('success', 'Album creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Artista::find($id);
        return view('album.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::find($id);
        return view('album.edit', compact('album'));
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
            'nombre' => 'required',
            'idArtista' => 'required',
            'gestionLanzamiento' => 'required'
        ]);
        $album = Album::find($id);
        $album->update($request->all());

        return redirect()->route('album.index')
            ->with('success', 'Album actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);
        return redirect()->route('album.index')
            ->with('success', 'Album eliminada satisfactoriamente');
    }
}
