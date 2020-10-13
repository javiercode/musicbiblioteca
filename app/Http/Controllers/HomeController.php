<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Cancion;
use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $artistaList = Artista::orderBy('nombre', 'asc')
            ->get()->toArray();

        $cancionList = Cancion::orderBy('nroReproducciones', 'desc')
        ->limit(20)->get();

        $albumList = Album::orderBy('nombre', 'asc')->get()
            ->map(function ($record) {
                return array($record->id => $record->nombre);
            })->all();
        $aAlbum= array_reduce($albumList,function ($carray, $oValue){
            $carray[key($oValue)]=$oValue[key($oValue)];
            return $carray;
        });

        return view('dashboard',
            ['artistaList'=>$artistaList,
                'cancionList'=>$cancionList,
                'aAlbum'=>$aAlbum
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function reproducir(Request $request, $id)
//    public function reproducir($id)
    {
//        $aData = $request->all();

        $cancion = Cancion::find($id);
        $aData['id'] = $id;
        $aData['nroReproducciones'] = $cancion->nroReproducciones+1;
        Cancion::update($aData);

        return redirect()->route('home')
            ->with('success', 'Reproduciendo'+ $cancion->nombre);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }
}
