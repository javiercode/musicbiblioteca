<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Album;
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

        $albumList = Album::orderBy('nombre', 'asc')->get()
            ->map(function ($record) {
                return array($record->id => $record->nombre);
            })->all();
        $albumList= array_reduce($albumList,function ($carray, $oValue){
            $carray[key($oValue)]=$oValue[key($oValue)];
            return $carray;
        });

        return view('cancion.index', ['aAlbum'=>$albumList, 'cancionList'=>$cancionList])
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albumList = Album::orderBy('nombre', 'desc')
            ->get()->toArray();

        return view('cancion.create', compact('albumList'));
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
        $aData = $request->all();
        if(!isset($aData['nroReproducciones'])){
            $aData['nroReproducciones'] = 0;
        }

        Cancion::create($aData);

        return redirect()->route('cancion.index')
            ->with('success', 'Cancion creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancion = Cancion::find($id);
        return view('cancion.show', compact('cancion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albumList = Album::orderBy('nombre', 'desc')
            ->get()->toArray();
        $cancion=Cancion::find($id);
//        return view('cancion.edit', compact('cancion'));
        return view('cancion.edit', ['cancion'=>$cancion, 'albumList'=>$albumList]);
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
            'idAlbum' => 'required',
            'nombre' => 'required'
        ]);
        $cancion = Cancion::find($id);
        $cancion->update($request->all());

        return redirect()->route('cancion.index')
            ->with('success', 'Cancion actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cancion::destroy($id);

        return redirect()->route('cancion.index')
            ->with('success', 'Cancion eliminada satisfactoriamente');
    }
}
